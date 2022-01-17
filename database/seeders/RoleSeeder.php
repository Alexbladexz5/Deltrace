<?php

namespace Database\Seeders;

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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Registered']);

        Permission::create(['name' => 'admin.home'])->assignRole($role1);

        Permission::create(['name' => 'admin.users.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.users.destroy'])->assignRole($role1);

        Permission::create(['name' => 'admin.routes.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.routes.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.routes.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.routes.destroy'])->assignRole($role1);

        Permission::create(['name' => 'admin.deliveries.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.deliveries.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.deliveries.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.deliveries.destroy'])->assignRole($role1);
    }
}
