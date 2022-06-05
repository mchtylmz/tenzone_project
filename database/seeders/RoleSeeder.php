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
        $role2 = Role::create(['name' => 'admin']);
        $role3 = Role::create(['name' => 'teacher']);
        $role4 = Role::create(['name' => 'theraphy']);
        $role5 = Role::create(['name' => 'parent']);
        $role6 = Role::create(['name' => 'user']);

        $permission1 = Permission::create(['name' => 'user_access']);
        $permission2 = Permission::create(['name' => 'user_access2']);
        $permission3 = Permission::create(['name' => 'user_access3']);

        $role2->givePermissionTo($permission2);
        $role3->givePermissionTo($permission3);
        $role4->givePermissionTo($permission1);
        $role5->givePermissionTo($permission2);
        $role6->givePermissionTo($permission3);
    }
}
