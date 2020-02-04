<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Managers\PermissionManager;

class AdminSystemPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionManager::newPermissionCrud('admin_configs');
        PermissionManager::newReadPermission('admin_configs_maintenance');
        PermissionManager::newCreatePermission('admin_configs_maintenance_set');
        PermissionManager::newReadPermission('admin_configs_base');

        PermissionManager::newPermissionCrud('admin_logs');
        PermissionManager::newReadPermission('admin_logs_ajax_list');
        PermissionManager::newReadPermission('admin_logs_ajax_details');
        PermissionManager::newDeletePermission('admin_logs_deleteAll');
        PermissionManager::newReadPermission('admin_logs_downloadAll');

        PermissionManager::newPermissionCrud('admin_notifications');

        PermissionManager::newPermissionCrud('admin_backups');

        PermissionManager::newPermissionCrud('admin_themes');
        PermissionManager::newReadPermission('admin_themes_layouts_read');
        PermissionManager::newUpdatePermission('admin_themes_layouts_update');
        PermissionManager::newReadPermission('admin_themes_includes_read');
        PermissionManager::newUpdatePermission('admin_themes_includes_update');
    }
}
