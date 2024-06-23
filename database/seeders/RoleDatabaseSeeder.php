<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permisson;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $roles = [
        //     ['name' => 'admin', 'display_name' => 'Administrator', 'group' => 'system', 'guard_name' => 'web'],
        //     ['name' => 'editor', 'display_name' => 'Editor', 'group' => 'system', 'guard_name' => 'web'],
        //     ['name' => 'user', 'display_name' => 'User', 'group' => 'system', 'guard_name' => 'web'],
        // ];

        // foreach ($roles as $role) {
        //     Role::updateOrCreate(
        //         ['name' => $role['name']],
        //         $role
        //     );
        // }

        $permissions = [
            // ['name' => 'create user', 'display_name' => 'Create User', 'group' => 'user'],
            // ['name' => 'update user', 'display_name' => 'Update User', 'group' => 'user'],
            // ['name' => 'show user', 'display_name' => 'Show User', 'group' => 'user'],
            // ['name' => 'delete user', 'display_name' => 'Delete User', 'group' => 'user'],


            // ['name' => 'create order', 'display_name' => 'Create order', 'group' => 'order'],
            // ['name' => 'update order', 'display_name' => 'Update order', 'group' => 'order'],
            // ['name' => 'show order', 'display_name' => 'Show order', 'group' => 'order'],
            // ['name' => 'delete order', 'display_name' => 'Delete order', 'group' => 'order'],


            // ['name' => 'create card', 'display_name' => 'Create card', 'group' => 'card'],
            // ['name' => 'update card', 'display_name' => 'Update card', 'group' => 'card'],
            // ['name' => 'show card', 'display_name' => 'Show card', 'group' => 'card'],
            // ['name' => 'delete card', 'display_name' => 'Delete card', 'group' => 'card'],

            ['name' => 'create link', 'display_name' => 'Create link', 'group' => 'link'],
            ['name' => 'update link', 'display_name' => 'Update link', 'group' => 'link'],
            ['name' => 'show link', 'display_name' => 'Show link', 'group' => 'link'],
            ['name' => 'delete link', 'display_name' => 'Delete link', 'group' => 'link'],
        ];

        foreach ($permissions as $item) {
            Permisson::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
