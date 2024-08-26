<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CompanyUserRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'company', 'guard_name' => 'web',
            'created_at' => now(), 'updated_at' => now()
        ]);
    }
}
