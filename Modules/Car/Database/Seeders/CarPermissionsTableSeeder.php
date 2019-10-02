<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\PermissionManager;
use App\Permission;
use App\Group;

class CarPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        PermissionManager::newPermissionCrud('admin_modules_car');
        PermissionManager::newPermissionCrud('admin_modules_car_options');
        PermissionManager::newPermissionCrud('admin_modules_car_best_premium');
        PermissionManager::newPermissionCrud('admin_modules_car_premium');
        PermissionManager::newPermissionCrud('admin_modules_car_free');
        PermissionManager::newPermissionCrud('admin_modules_car_verifications');

        // Admin Permissions
        PermissionManager::attachGroupPermissions(1, Permission::where('title', 'LIKE', 'admin_modules_car%')->get());
    }
}
