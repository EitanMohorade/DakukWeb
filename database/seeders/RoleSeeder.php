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
        $adminRole = Role::create(['name' => 'admin']);
        $clientRole = Role::create(['name' => 'client']);
        
        Permission::create(['name' => 'index']);

        Permission::create(['name' => 'users.index'])->assignRole($adminRole);
        Permission::create(['name' => 'users.show'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'users.new'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'users.store'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'users.update'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'users.delete'])->syncRoles([$adminRole, $clientRole]);

        Permission::create(['name' => 'products.index'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'products.show'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'products.new'])->assignRole($adminRole);
        Permission::create(['name' => 'products.store'])->assignRole($adminRole);
        Permission::create(['name' => 'products.edit'])->assignRole($adminRole);
        Permission::create(['name' => 'products.update'])->assignRole($adminRole);
        Permission::create(['name' => 'products.delete'])->assignRole($adminRole);
        
        Permission::create(['name' => 'categories.index'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'categories.show'])->syncRoles([$adminRole, $clientRole]);
        Permission::create(['name' => 'categories.new'])->assignRole($adminRole);
        Permission::create(['name' => 'categories.store'])->assignRole($adminRole);
        Permission::create(['name' => 'categories.edit'])->assignRole($adminRole);
        Permission::create(['name' => 'categories.update'])->assignRole($adminRole);
        Permission::create(['name' => 'categories.delete'])->assignRole($adminRole);
    }
}
