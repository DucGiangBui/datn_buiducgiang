<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\SocialInfo;
use App\Models\UserSocialInfo;

class GuestController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($linkUrl)
    {
        $user = User::where('link_url', $linkUrl)
                    ->with('userInfo', 'socialInfos', 'userSocialInfos')
                    ->first();
        $socialUser = $user->userSocialInfos;
        if (!$user) {
            abort(404, 'User not found');
        }

        return view('guest.index', compact('user', 'socialUser'));
    }
}
