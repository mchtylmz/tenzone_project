<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'superadmin']);
        $role2 = Role::create(['name' => 'admin']);
        $role3 = Role::create(['name' => 'parent']);

        $permission1 = Permission::create(['name' => 'user_access']);
        $permission2 = Permission::create(['name' => 'user_access2']);
        $permission3 = Permission::create(['name' => 'user_access3']);

        $role1->givePermissionTo($permission1);
        $role2->givePermissionTo($permission2);
        $role3->givePermissionTo($permission3);
    }
}
