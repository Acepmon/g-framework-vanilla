<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Basic Permissions
        $this->call(BasicPermissionsTableSeeder::class);

        // Admin Permissions
        $this->call(AdminPermissionsTableSeeder::class);

        // Admin System Permissions
        $this->call(AdminSystemPermissionsTableSeeder::class);

        // Admin User Permissions
        $this->call(AdminUserPermissionsTableSeeder::class);

        // Admin Content Permissions
        $this->call(AdminContentPermissionsTableSeeder::class);

        // Admin Banner Permissions
        $this->call(AdminBannerPermissionsTableSeeder::class);

        // Ajax Permissions
        $this->call(AjaxPermissionsTableSeeder::class);
    }
}
