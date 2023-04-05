<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'opinion-list',
           'opinion-create',
           'opinion-edit',
           'opinion-delete',
           'opinion-own-list',
           'opinion-own-edit',
           'opinion-own-delete',
           'permission-list',
           'permission-create',
           'permission-edit',
           'permission-delete',
        ];

        foreach ($permissions as $permission) {
            //  Permission::create(['guard_name' => 'sanctum','name' => $permission]);
            Permission::create(['guard_name' => 'web','name' => $permission]);

        }

    }

}
