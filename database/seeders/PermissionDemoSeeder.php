<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'magazines']);
        Permission::create(['name' => 'newspapers']);
        Permission::create(['name' => 'categories']);
        Permission::create(['name' => 'publications']);
        Permission::create(['name' => 'plans']);
        Permission::create(['name' => 'gallery']);
        Permission::create(['name' => 'podcasts']);
        Permission::create(['name' => 'videos']);
        Permission::create(['name' => 'blogs']);
        Permission::create(['name' => 'ads']);
        Permission::create(['name' => 'coupons']);
        Permission::create(['name' => 'positions']);
        Permission::create(['name' => 'notifications']);
        Permission::create(['name' => 'rss']);
        Permission::create(['name' => 'content manager']);
        Permission::create(['name' => 'reports']);
        Permission::create(['name' => 'refunds']);
    }
}
