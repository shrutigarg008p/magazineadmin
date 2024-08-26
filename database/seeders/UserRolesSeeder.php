<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayOfRoleNames = [
            User::SUPERADMIN, 
            User::ADMIN, 
            User::EDITOR, 
            User::REPORTER, 
            User::VENDOR, 
            User::CUSTOMER
        ];
        
        $roles = collect($arrayOfRoleNames)->map(function ($role) {
            return [
                'name' => $role, 'guard_name' => 'web',
                'created_at' => now(), 'updated_at' => now()
            ];
        });
        # Insert Roles
        Role::insert($roles->toArray());
        # Create SuperAdmin User and Assign Role
        $user = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@email.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $user->assignRole(User::SUPERADMIN);
    }
}
