<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'title' => 'Dashboard',
                'link' => '/admin/dashboard',
                'icon' => 'icon-home4',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 1,
                'sublevel' => 1,
                'group' => 'overview',
            ],
            [
                'title' => 'Changelog',
                'link' => '/admin/changelog',
                'icon' => 'icon-list-unordered',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 2,
                'sublevel' => 1,
                'group' => 'overview',
            ],
            [
                'title' => 'System Users',
                'link' => '',
                'icon' => 'icon-user-tie',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 3,
                'sublevel' => 1,
                'group' => 'system',
            ],
            [
                'title' => 'Configurations',
                'link' => '',
                'icon' => 'icon-gear',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 4,
                'sublevel' => 1,
                'group' => 'system',
            ],
            [
                'title' => 'Plugins',
                'link' => '',
                'icon' => 'icon-puzzle2',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 5,
                'sublevel' => 1,
                'group' => 'system',
            ],
            [
                'title' => 'Themes',
                'link' => '',
                'icon' => 'icon-brush',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 6,
                'sublevel' => 1,
                'group' => 'system',
            ],
            [
                'title' => 'Notifications',
                'link' => '',
                'icon' => 'icon-mail5',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 7,
                'sublevel' => 1,
                'group' => 'system',
            ],
            [
                'title' => 'Backups',
                'link' => '/admin/backups',
                'icon' => 'icon-database',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 8,
                'sublevel' => 1,
                'group' => 'system',
            ],
            [
                'title' => 'Logs',
                'link' => '/admin/logs',
                'icon' => 'icon-archive',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 9,
                'sublevel' => 1,
                'group' => 'system',
            ],
            [
                'title' => 'Users',
                'link' => '/admin/users',
                'icon' => 'icon-user',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 10,
                'sublevel' => 1,
                'group' => 'users',
            ],
            [
                'title' => 'Permissions',
                'link' => '/admin/permissions',
                'icon' => 'icon-key',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 11,
                'sublevel' => 1,
                'group' => 'users',
            ],
            [
                'title' => 'Groups',
                'link' => '/admin/groups',
                'icon' => 'icon-users2',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 12,
                'sublevel' => 1,
                'group' => 'users',
            ],
            [
                'title' => 'Auctions',
                'link' => '/admin/auctions',
                'icon' => 'icon-hammer2',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 13,
                'sublevel' => 1,
                'group' => 'auction',
            ],
            [
                'title' => 'Buyers / Sellers',
                'link' => '/admin/buyers',
                'icon' => 'icon-people',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 14,
                'sublevel' => 1,
                'group' => 'auction',
            ],
            [
                'title' => 'Items',
                'link' => '/admin/items',
                'icon' => 'icon-cart2',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 15,
                'sublevel' => 1,
                'group' => 'auction',
            ],
            [
                'title' => 'Menus',
                'link' => '/admin/menus',
                'icon' => 'icon-menu2',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 16,
                'sublevel' => 1,
                'group' => 'content',
            ],
            [
                'title' => 'Pages',
                'link' => '/admin/contents?type=page',
                'icon' => 'icon-files-empty2',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 17,
                'sublevel' => 1,
                'group' => 'content',
            ],
            [
                'title' => 'Blog Posts',
                'link' => '/admin/contents?type=post',
                'icon' => 'icon-blog',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 18,
                'sublevel' => 1,
                'group' => 'content',
            ],
            [
                'title' => 'Comments',
                'link' => '/admin/comments',
                'icon' => 'icon-comment',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 19,
                'sublevel' => 1,
                'group' => 'content',
            ],
            [
                'title' => 'Media & Assets',
                'link' => '/admin/media',
                'icon' => 'icon-media',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 20,
                'sublevel' => 1,
                'group' => 'content',
            ],
            [
                'title' => 'Localization',
                'link' => '/admin/localization',
                'icon' => 'icon-flag3',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 21,
                'sublevel' => 1,
                'group' => 'content',
            ],
            [
                'title' => 'Categories',
                'link' => '/admin/taxonomy?taxonomy=category',
                'icon' => 'icon-grid6',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 22,
                'sublevel' => 1,
                'group' => 'content',
            ],
            [
                'title' => 'Tags',
                'link' => '/admin/taxonomy?taxonomy=tag',
                'icon' => 'icon-price-tag2',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 23,
                'sublevel' => 1,
                'group' => 'content',
            ]
        ]);

        DB::table("menus")->insert([
            [
                'title' => 'Administrators',
                'link' => '/admin/users/administrators',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 1,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 3,
            ],
            [
                'title' => 'Operators',
                'link' => '/admin/users/operators',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 2,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 3,
            ],
            [
                'title' => 'Maintenance Mode',
                'link' => '/admin/configs/maintenance',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 1,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 4,
            ],
            [
                'title' => 'Base Configurations',
                'link' => '/admin/configs/base',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 2,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 4,
            ],
            [
                'title' => 'System Configurations',
                'link' => '/admin/configs/system',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 3,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 4,
            ],
            [
                'title' => 'Themes Configurations',
                'link' => '/admin/configs/themes',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 4,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 4,
            ],
            [
                'title' => 'Plugins Configurations',
                'link' => '/admin/configs/plugins',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 5,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 4,
            ],
            [
                'title' => 'Security Configurations',
                'link' => '/admin/configs/security',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 6,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 4,
            ],
            [
                'title' => 'Content Configurations',
                'link' => '/admin/configs/contents',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 7,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 4,
            ],
            [
                'title' => 'Installed Plugins',
                'link' => '/admin/plugins',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 1,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 5,
            ],
            [
                'title' => 'Add New',
                'link' => '/admin/plugins/create',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 2,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 5,
            ],
            [
                'title' => 'Installed Themes',
                'link' => '/admin/themes',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 1,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 6,
            ],
            [
                'title' => 'Add New',
                'link' => '/admin/themes/create',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 2,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 6,
            ],
            [
                'title' => 'Layouts',
                'link' => '/admin/themes/layouts',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 3,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 6,
            ],
            [
                'title' => 'Editor',
                'link' => '/admin/themes/editor',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 4,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 6,
            ],
            [
                'title' => 'Triggers',
                'link' => '/admin/notifications/triggers',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 1,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 7,
            ],
            [
                'title' => 'Channels',
                'link' => '/admin/notifications/channels',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 2,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 7,
            ],
            [
                'title' => 'Events',
                'link' => '/admin/notifications/events',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 3,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 7,
            ],
            [
                'title' => 'Templates',
                'link' => '/admin/notifications/templates',
                'icon' => '',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 4,
                'sublevel' => 2,
                'group' => 'system',
                'parent_id' => 7,
            ]
        ]);
    }
}
