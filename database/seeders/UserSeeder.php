<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_super_admin = Role::where('name', 'super_admin')->first();
        $role_staff = Role::where('name', 'staff')->first();

        if ($role_admin && $role_super_admin && $role_staff) {
            User::create([
                'name' => 'staff',
                'username' => 'staff',
                'role_id' => $role_staff->id,
                'password' => bcrypt('12345678')
            ]);
            User::create([
                'name' => 'admin',
                'username' => 'admin',
                'role_id' => $role_admin->id,
                'password' => bcrypt('12345678')
            ]);
            User::create([
                'name' => 'superadmin',
                'username' => 'superadmin',
                'role_id' => $role_super_admin->id,
                'password' => bcrypt('12345678')
            ]);
        } else {
            echo "Roles not found. Seeding users aborted.";
        }
    }
}
