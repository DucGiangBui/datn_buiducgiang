<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Roles\CreateRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::latest('role_id')->paginate(5);
        return view('admin.roles.index',compact('roles'));
        // return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $dataCreate = $request->all();
        $roles = Role::create($dataCreate);

        if ($roles) {
            return to_route('roles.index')->with(['message' => 'Thêm mới vai trò thành công!']);
        }
        return back()->withErrors(['message' => 'Cập nhật vai trò thất bại!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role_id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role_id)
    {
        $role = Role::findOrFail($role_id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $dataUpdate = $request->all();
        $role->update($dataUpdate);

        if ($role) {
            return to_route('roles.index')->with(['message' => 'Cập nhật vai trò thành công!']);
        }
        return back()->withErrors(['message' => 'Cập nhật vai trò thất bại!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $role = Role::findOrFail($id);
            $role->delete();
            if($role){
                return redirect()->route('roles.index')->with('message', 'Xóa vai trò thành công!');
            }
            return back()->withErrors(['message' => 'Xóa vai trò không thành công!']);
    }

}
