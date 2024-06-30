<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->latest('user_id')->paginate(5);
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
            return to_route('users.index')->with(['message' => 'Thêm mới vai trò thành công!']);
        }
        return back()->withErrors(['message' => 'Them vai trò thất bại!']);
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
            return to_route('users.index')->with(['message' => 'Cập nhật người dùng thành công!']);
        }
        return back()->withErrors(['message' => 'Cập nhật người dùng thất bại!']);
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

        return redirect()->route('users.index')->with(['message' => 'Xoá người dùng thành công!']);
    }
}
