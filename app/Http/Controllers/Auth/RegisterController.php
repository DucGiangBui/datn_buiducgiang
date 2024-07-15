<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Card;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $card = Card::create([
            'card_url' => Str::random(10),
            'template_id' => '0',
        ]);

        if (!$card) {
            Log::error('Failed to create card');
            return null;
        }

        $card_id = Card::latest()->first()->card_id;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'link_url' => Str::random(10),
            'card_id' => $card_id,
        ]);

        if (!$user) {
            Log::error('Failed to create user');
            return null;
        }

        UserInfo::create([
            'user_id' => $user->user_id,
            'avatar_url' => null,
            'position' => null,
            'company' => null,
            'address' => null,
        ]);

        return $user;
    }

}
