<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\PermissionManager;

class AjaxPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionManager::newPermissionCrud('ajax_users');
        PermissionManager::newPermissionCrud('ajax_users_metas');
        PermissionManager::newPermissionCrud('ajax_groups');
        PermissionManager::newPermissionCrud('ajax_contents');
        PermissionManager::newPermissionCrud('ajax_contents_metas');
    }
}
