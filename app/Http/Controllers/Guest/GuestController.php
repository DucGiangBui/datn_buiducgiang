<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\SocialInfo;

class GuestController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Giả sử user_id là 1
        $user = User::with('userInfo', 'socialInfos')->find(30);


        return view('guest.index', compact('user'));
    }
}
