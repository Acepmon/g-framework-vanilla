<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Managers\PermissionManager;

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
