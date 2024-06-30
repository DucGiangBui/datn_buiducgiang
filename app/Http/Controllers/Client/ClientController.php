<?php
// app/Http/Controllers/Client/ClientController.php
// app/Http/Controllers/Client/ClientController.php
namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\SocialInfo;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Lấy người dùng hiện tại
        return view('client.profiles.index', compact('user'));
    }

    // Hiển thị thông tin người dùng theo ID
    public function show($id)
    {
        $user = User::with('userInfo', 'socialInfos')->findOrFail($id);
        return view('guest.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user(); // Lấy người dùng hiện tại
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
        $userInfo->user_id = $user->id; // Đảm bảo user_id được gán đúng

        $userInfo->save();
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    // app/Http/Controllers/Client/ClientController.php


    public function editProfile()
    {
        $user = Auth::user();
        return view('client.profiles.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('avatars', 'public');
            $user->userInfo()->update([
                'avatar_url' => $avatar,
            ]);
        }

        $user->userInfo()->update([
            'position' => $request->input('position'),
        ]);
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }

    public function editSocial($id)
    {
        $user = Auth::user();
        $socialInfo = $user->socialInfos->find($id);
        $allSocialInfos = SocialInfo::all(); // Lấy tất cả các biểu tượng mạng xã hội
        return view('client.profiles.edit-social', compact('user', 'socialInfo', 'allSocialInfos'));
    }

    public function updateSocial(Request $request, $id)
    {
        $user = Auth::user();
        $socialInfo = $user->socialInfos->find($id);

        $socialInfo->pivot->social_url = $request->input('social_url');
        $socialInfo->social_icon = $request->input('social_icon');
        $socialInfo->pivot->save();

        return redirect()->route('profile.index')->with('success', 'Social link updated successfully.');
    }


    public function destroy()
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home')->with('success', 'Profile deleted successfully.');
    }
}
