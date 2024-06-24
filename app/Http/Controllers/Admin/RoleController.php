<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permisson;
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
        $roles = Role::latest('id')->paginate(5);
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
        $permissions = Permisson::all()->groupBy('group');
        return view('admin.roles.create', compact('permissions'));
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
        $dataCreate['guard_name'] = 'web';
        $role = Role::create($dataCreate);


        if ($role->update($dataCreate)) {
            if (isset($dataCreate['permission_ids'])) {
                $role->permissions()->attach($dataCreate['permission_ids']);
            }
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
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        $permissions = Permisson::all()->groupBy('group');

        return view('admin.roles.edit', compact('role','permissions'));
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

        \Log::info('Data update:', $dataUpdate);

        if ($role->update($dataUpdate)) {
            if (isset($dataUpdate['permission_idn'])) {
                $role->permissions()->sync($dataUpdate['permission_idn']);
            }
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

    return redirect()->route('roles.index')->with(['message' => 'Xoá vai trò thành công!']);
    }
}
