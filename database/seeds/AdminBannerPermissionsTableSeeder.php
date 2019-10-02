<?php

use Illuminate\Database\Seeder;

use App\Entities\PermissionManager;

class AdminBannerPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionManager::newPermissionCrud('admin_banners');
        PermissionManager::newPermissionCrud('admin_banners_locations');
    }
}
