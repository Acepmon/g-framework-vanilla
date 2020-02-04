<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Menu;
use App\Managers\MenuManager;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboardMenus = [
            ['title' => 'Dashboard', 'link' => '/admin/dashboard', 'meta' => ['module' => 'Dashboard', 'icon' => 'icon-statistics']],
            ['title' => 'Changelog', 'link' => '/admin/changelog', 'meta' => ['module' => 'Dashboard', 'icon' => 'icon-list-unordered']]
        ];

        $systemMenus = [
            ['title' => 'Menus', 'link' => '/admin/menus', 'meta' => ['module' => 'System Management', 'icon' => 'icon-menu2']],
            ['title' => 'Configurations', 'link' => '/admin/configurations', 'meta' => ['module' => 'System Management', 'icon' => 'icon-gear']],
            ['title' => 'Themes', 'link' => '/admin/themes', 'meta' => ['module' => 'System Management', 'icon' => 'icon-brush']],
            ['title' => 'Backups', 'link' => '/admin/backups', 'meta' => ['module' => 'System Management', 'icon' => 'icon-database']],
            ['title' => 'Logs', 'link' => '/admin/logs', 'meta' => ['module' => 'System Management', 'icon' => 'icon-archive']],
        ];

        $userMenus = [
            ['title' => 'Users', 'link' => '/admin/users', 'meta' => ['module' => 'User Management', 'icon' => 'icon-user']],
            ['title' => 'Permissions', 'link' => '/admin/permissions', 'meta' => ['module' => 'User Management', 'icon' => 'icon-key']],
            ['title' => 'Groups', 'link' => '/admin/groups', 'meta' => ['module' => 'User Management', 'icon' => 'icon-users2']],
        ];

        $adminMenus = [
            'title' => 'Admin', 'link' => '/admin', 'meta' => ['module' => 'Admin'],
            'children' => array_merge($dashboardMenus, $systemMenus, $userMenus)
        ];

        $profileMenus = [
            'title' => 'Admin Profile', 'link' => '/admin/profile', 'meta' => ['module' => 'Profile', 'icon' => 'icon-user'],
            'children' => [
                ['title' => 'Profile', 'link' => '/admin/profile', 'meta' => ['module' => 'Profile', 'icon' => 'icon-user']],
                ['title' => 'Permissions', 'link' => '/admin/profile/permissions', 'meta' => ['module' => 'Profile', 'icon' => 'icon-key']],
                ['title' => 'Notifications', 'link' => '/admin/profile/notifications', 'meta' => ['module' => 'Profile', 'icon' => 'icon-bell2']],
                ['title' => 'Groups', 'link' => '/admin/profile/groups', 'meta' => ['module' => 'Profile', 'icon' => 'icon-users2']],
            ]
        ];

        MenuManager::iterate([$adminMenus], 1, null, [1, 2]);
        MenuManager::iterate([$profileMenus], 1, null, [1, 2]);
    }
}
