<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Tạo các permission
        Permission::create(['name' => 'view admin']);

        // Tạo role và gán các permission
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('view admin');

        $user = \App\Models\User::find(1); // Gán role cho người dùng đầu tiên (hoặc bạn có thể tạo người dùng mới)
        $user->assignRole('admin');
    }
}
