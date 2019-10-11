<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\PermissionManager;

class AdminPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionManager::newReadPermission('admin_dashboard');

        PermissionManager::newReadPermission('admin_changelog');

        PermissionManager::newPermissionCrud('admin_profile');
        PermissionManager::newPermissionCrud('admin_profile_contents');
        PermissionManager::newPermissionCrud('admin_profile_permissions');
        PermissionManager::newPermissionCrud('admin_profile_notifications');
    }
}
