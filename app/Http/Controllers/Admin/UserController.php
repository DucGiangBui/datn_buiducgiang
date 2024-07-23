<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->latest('user_id')->paginate(10);
        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {

        $dataCreate = $request->all();

        if (User::where('email', $dataCreate['email'])->exists()) {
            return back()->withErrors(['email' => 'Email đã tồn tại trong hệ thống.'])->withInput();
        }

        $dataCreate['password'] = Hash::make($request->password);
        $user = User::create($dataCreate);


        if ($user) {
            return to_route('users.index')->with(['message' => 'Thêm mới người dùng thành công!']);
        }
        return back()->withErrors(['message' => 'Thêm người dùng thất bại!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::with('role')->findOrFail($user_id);
        $roles = Role::all(); // Lấy tất cả các vai trò
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update($request->only(['name', 'email', 'gender', 'role_id']));
        if ($user) {
            Session::flash('message', 'Cập nhật người dùng thành công!');
            return to_route('users.index');
        }
        Session::flash('alert', 'Cập nhật người không thành công!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();


        Session::flash('alert', 'Xoá người dùng thành công!');
        return redirect()->route('users.index');
    }
}
