<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => "manage gelombang"]);
        Permission::create(['name' => "manage user"]);
        Permission::create(['name' => "manage pendaftar"]);
        Permission::create(['name' => "mendaftar"]);
        $permission = Permission::all();

        $admin = Role::create(["name" => "admin"]);
        $user = Role::create(["name" => "pendaftar"]);

        $admin->syncPermissions($permission);
        $user->givePermissionTo(['mendaftar']);

        $userAdmin = User::factory()->make([
            "name" => 'pak_admin',
            'email' => 'admin@gmail.com',
            'password' => '123',
        ]);
        $userAdmin->assignRole('admin');

        $userPendaftar = User::factory()->make([
            "name" => 'pak pendaftar',
            'email' => 'pendaftar@gmail.com',
            'password' => '123',
        ]);
        $userPendaftar->assignRole('pendaftar');
    }
}
