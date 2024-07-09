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

    // app/Http/Controllers/Client/ClientController.php

    public function createSocial()
    {
        $user = Auth::user();
        $allSocialInfos = SocialInfo::all(); // Lấy tất cả các thông tin xã hội có sẵn

        return view('client.profiles.create-social', compact('user', 'allSocialInfos'));
    }


    public function editProfile()
    {
        $user = Auth::user();
        return view('client.profiles.edit-profile', compact('user'));
    }

    public function storeSocial(Request $request)
    {
        $user = Auth::user();

        // Xác thực dữ liệu đầu vào
        $request->validate([
            'social_url' => 'required|url',
            'social_icon' => 'required|string',
            'social_info_id' => 'required|exists:social_infos,id', // Giả sử bạn cần ID của social info
        ]);

        // Lưu thông tin xã hội mới
        $user->socialInfos()->create([
            'social_url' => $request->input('social_url'),
            'social_icon' => $request->input('social_icon'),
            'social_info_id' => $request->input('social_info_id'),
        ]);

        return redirect()->route('profile.index')->with('success', 'Social link created successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();

        $userInfo = $user->userInfo;

        // Xử lý ảnh đại diện nếu có
        if ($request->hasFile('avatar')) {
            // Xóa file cũ nếu có
            if ($userInfo && $userInfo->avatar_url) {
                $oldFilePath = public_path($userInfo->avatar_url);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Lưu file mới vào thư mục client/assets/imgs/avatars
            $file = $request->file('avatar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'client/assets/imgs/avatars/' . $fileName;
            $file->move(public_path('client/assets/imgs/avatars'), $fileName);

            // Cập nhật đường dẫn
            $avatarUrl = $filePath;

            // Nếu không có thông tin người dùng, tạo mới
            if (!$userInfo) {
                $userInfo = new UserInfo();
                $userInfo->user_id = $user->id;
            }
            $userInfo->avatar_url = $avatarUrl;
        }

        // Cập nhật thông tin người dùng
        if ($userInfo) {
            $userInfo->position = $request->input('position');
            $userInfo->save();
        }

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }



    public function editSocial($id)
    {
        $user = Auth::user();
        $socialInfo = $user->socialInfos->find($id);
        $allSocialInfos = SocialInfo::all();
        return view('client.profiles.edit-social', compact('user', 'socialInfo', 'allSocialInfos'));
    }

    public function updateSocial(Request $request, $id)
    {
        $user = Auth::user();
        $socialInfo = $user->socialInfos->find($id);

        $socialInfo->pivot->social_url = $request->input('social_url');
        $socialInfo->social_id = $request->input('social_icon');
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
