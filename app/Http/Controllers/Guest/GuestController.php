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
    public function index($id)
    {
        $user = User::with('userInfo', 'socialInfos')->find($id);
        if (!$user) {
            abort(404, 'User not found');
        }
        return view('guest.index', compact('user'));
    }
}
