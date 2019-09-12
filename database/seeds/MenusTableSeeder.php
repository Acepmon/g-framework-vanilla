<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Structure
        // [Title, Link, Icon, Group, Children[]?]

        $adminMenus = ['Admin', '/admin', '', '', [
            // Overview
            ['Dashboard', '/admin/dashboard', 'icon-home4', 'overview'],
            ['Changelog', '/admin/changelog', 'icon-list-unordered', 'overview'],
            // System
            ['System Users', '', 'icon-user-tie', 'system', [
                ['Administrators', '/admin/users/administrators', '', 'system'],
                ['Operators', '/admin/users/operators', '', 'system']
            ]],
            ['Configurations', '', 'icon-gear', 'system', [
                ['Maintenance Mode', '/admin/configs/maintenance', '', 'system'],
                ['Base Configurations', '/admin/configs/base', '', 'system'],
                ['System Configurations', '/admin/configs/system', '', 'system'],
                ['Themes Configurations', '/admin/configs/themes', '', 'system'],
                // ['Plugins Configurations', '/admin/configs/plugins', '', 'system'],
                // ['Security Configurations', '/admin/configs/security', '', 'system'],
                ['Content Configurations', '/admin/configs/contents', '', 'system']
            ]],
            // ['Plugins', '', 'icon-puzzle2', 'system', [
            //     ['Installed Plugins', '/admin/plugins', '', 'system'],
            //     ['Add New', '/admin/plugins/create', '', 'system']
            // ]],
            ['Themes', '', 'icon-brush', 'system', [
                ['Installed Themes', '/admin/themes', '', 'system', 'parent_id' => 6],
                ['Add New', '/admin/themes/create', '', 'system', 'parent_id' => 6]
            ]],
            ['Backups', '/admin/backups', 'icon-database', 'system'],
            ['Logs', '/admin/logs', 'icon-archive', 'system'],
            // User management
            ['Users', '/admin/users', 'icon-user', 'user management'],
            ['Permissions', '/admin/permissions', 'icon-key', 'user management'],
            ['Groups', '/admin/groups', 'icon-users2', 'user management'],
            // Auction
            ['Auctions', '/admin/auctions', 'icon-hammer2', 'auction'],
            ['Buyers / Sellers', '/admin/buyers', 'icon-people', 'auction'],
            ['Items', '/admin/items', 'icon-cart2', 'auction'],
            // Content management
            ['Menus', '/admin/menus', 'icon-menu2', 'content management'],
            ['Pages', '/admin/contents?type=page', 'icon-files-empty2', 'content management'],
            ['Blog Posts', '/admin/contents?type=post', 'icon-blog', 'content management'],
            // ['Comments', '/admin/comments', 'icon-comment', 'content management'],
            ['Media & Assets', '/admin/media', 'icon-media', 'content management'],
            // ['Localization', '/admin/localization', 'icon-flag3', 'content management'],
            ['Categories', '/admin/taxonomy?taxonomy=category', 'icon-grid6', 'content management'],
            ['Tags', '/admin/taxonomy?taxonomy=tag', 'icon-price-tag2', 'content management'],
            // Car Management
            ['Cars', '/admin/cars', 'icon-car', 'car management'],
            ['Specials', '/admin/cars/specials', 'icon-fire', 'car management'],
            ['Car Options', '/admin/cars/options', 'icon-cog', 'car management'],
            ['Add Car', '/admin/cars/create', 'icon-plus3', 'car management'],
            // Banner Management
            ['Banners', '/admin/banners', 'icon-printer4', 'banner management'],
            ['Create Banner', '/admin/banners/create', 'icon-plus3', 'banner management']
        ]];
        $carMainMenus = ['Car Main', '', '', '', [
            ['Home', '/', '', ''],
            ['Buy', '/buy', '', ''],
            ['Sell', '/sell', '', ''],
            ['Finance', '/finance', '', ''],
            ['Auction', '/auction', '', '']
        ]];
        $carTopbarMenus = ['Car Topbar', '', '', '', [
            ['About', '/about-us', '', ''],
            ['Contact Us', '/contact-us', '', ''],
            ['Sign Up', '/register', '', '']
        ]];
        $carFooterMenus = ['Car Footer', '', '', '', [
            ['About', '/about-us', '', ''],
            ['Contact Us', '/contact-us', '', '']
        ]];

        $menus = [
            $adminMenus,
            $carMainMenus,
            $carTopbarMenus,
            $carFooterMenus
        ];

        $this->iterate($menus, 1);
    }

    private function iterate($array, $sublevel, $parent = null) {
        for ($i=0; $i < count($array); $i++) {
            // dd($array[$i]);
            $menu = $this->insertMenu($array[$i][0], $array[$i][1], $array[$i][2], $array[$i][3], $sublevel, $i + 1, $parent);
            if (array_key_exists(4, $array[$i]) && count($array[$i][4]) > 0) {
                $this->iterate($array[$i][4], $sublevel + 1, $menu->id);
            }
        }
    }

    private function insertMenu($title, $link, $icon, $group, $sublevel, $order, $parent = null) {
        $menu = new Menu();
        $menu->title = $title;
        $menu->link = $link;
        $menu->icon = $icon;
        $menu->group = $group;
        $menu->sublevel = $sublevel;
        $menu->order = $order;
        $menu->parent_id = $parent;
        $menu->save();

        return $menu;
    }
}
