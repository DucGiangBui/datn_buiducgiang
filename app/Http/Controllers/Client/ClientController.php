<?php
namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Card;
use App\Models\UserInfo;
use App\Models\SocialInfo;
use App\Models\UserSocialInfo;
use App\Models\TemplateCard;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('client.profiles.index', compact('user'));
    }

    public function show()
    {
        $user = User::with('userInfo', 'socialInfos')->findOrFail($id);
        return view('guest.index', compact('user'));
    }
    public function cardIndex()
    {
        $user = auth()->user();
        $userInfo = UserInfo::where('user_id', $user->user_id)->first();
        $card = Card::where('card_id', $user->card_id)->first();
        $template = TemplateCard::where('template_id', $card->template_id)->first();

        return view('client.profiles.card', compact('user', 'template'));
    }

    public function updateUrl(Request $request)
    {
        $user = Auth::user();

        $user->link_url = $request->input('link_url');
        $user->save();
        return redirect()->route('profile.index')->with('success', 'Link URL đã được cập nhật thành công!');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('client.profiles.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'link_url' => 'nullable|url'
        ]);

        $user->name = $request->input('name');

        $userInfo = $user->userInfo ?: new UserInfo();
        $userInfo->position = $request->input('position');
        $userInfo->company = $request->input('company');
        $userInfo->address = $request->input('address');

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $userInfo->avatar_url = $avatarPath;
        }

        $userInfo->link_url = $request->input('link_url');
        $userInfo->user_id = $user->user_id;

        $userInfo->save();
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }


    public function editProfile()
    {
        $user = Auth::user();
        return view('client.profiles.edit-profile', compact('user'));
    }

    public function createSocial()
    {
        $allSocialInfos = SocialInfo::all();
        return view('client.profiles.create-social', compact('allSocialInfos'));
    }

    public function storeSocial(Request $request)
    {
        $request->validate([
            'social_url' => 'required|url',
            'social_id' => 'required|exists:social_infos,social_id',
        ]);

        $user = Auth::user();
        $user->socialInfos()->attach($request->input('social_id'), [
            'social_url' => $request->input('social_url'),
            'status' => 1,
        ]);

        return redirect()->route('profile.index')->with('success', 'Social link added successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        $userInfo = $user->userInfo;

        if ($request->hasFile('avatar')) {
            if ($userInfo && $userInfo->avatar_url) {
                $oldFilePath = public_path($userInfo->avatar_url);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'client/assets/imgs/avatars/' . $fileName;
            $file->move(public_path('client/assets/imgs/avatars'), $fileName);

            $avatarUrl = $filePath;
            if (!$userInfo) {
                $userInfo = new UserInfo();
                $userInfo->user_id = $user->id;
            }
            $userInfo->avatar_url = $avatarUrl;
        }

        if ($userInfo) {
            $userInfo->position = $request->input('position');
            $userInfo->save();
        }

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }



    public function editSocial(Request $request, $id)
    {
        $extraValue = $request->query('extra');

        $user = Auth::user();
        $socialInfo = $user->socialInfos->find($extraValue);
        $usocialInfo = $user->userSocialInfos->find($id);
        $allSocialInfos = SocialInfo::all();
        $alluSocialInfos = UserSocialInfo::all();
        return view('client.profiles.edit-social', compact('user', 'socialInfo', 'usocialInfo', 'allSocialInfos', 'alluSocialInfos'));
    }

    public function updateSocialInfo(Request $request, $id)
    {
        $user = Auth::user();

        $usocialInfo = $user->userSocialInfos()->where('user_social_id', $id)->first();

        if ($usocialInfo) {
            $usocialInfo->social_url = $request->input('social_url');
            $usocialInfo->social_id = $request->input('social_id');
            $usocialInfo->save();

            return redirect()->route('profile.index')->with('success', 'Social link updated successfully.');
        } else {
            return redirect()->route('profile.index')->with('error', 'Social link not found.');
        }
    }

    public function destroySocial(Request $request)
    {
        $user = Auth::user();
        $userSocialId = $request->input('user_social_id');

        $usocialInfo = $user->userSocialInfos()->where('user_social_id', $userSocialId)->first();

        if ($usocialInfo) {
            $usocialInfo->delete();

            return redirect()->route('profile.index')->with('success', 'Social link deleted successfully.');
        } else {
            return redirect()->route('profile.index')->with('error', 'Social link not found.');
        }
    }

}
