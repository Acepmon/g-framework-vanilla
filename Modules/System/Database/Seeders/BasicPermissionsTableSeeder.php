<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\PermissionManager;

class BasicPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PermissionManager::newReadPermission('');
        PermissionManager::newReadPermission('home');
        PermissionManager::newReadPermission('page');
        PermissionManager::newReadPermission('login');
        PermissionManager::newReadPermission('register');
        PermissionManager::newReadPermission('logout');
        PermissionManager::newReadPermission('password_reset');
        PermissionManager::newUpdatePermission('password_update');
        PermissionManager::newUpdatePermission('password_request');
        PermissionManager::newUpdatePermission('verification_verify');
    }
}
