<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Menu;

class CarMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Structure
        // [Title, Link, Icon, Module, Children[]?]

        $adminMenus = [
            // Car Management
            ['Add Car', '/admin/modules/car/create', 'icon-plus3', 'Car'],
            ['Cars', '/admin/modules/car', 'icon-car', 'Car', [
                ['Best Premium', '/admin/modules/car/best_premium', '', 'Car'],
                ['Premium', '/admin/modules/car/premium', '', 'Car'],
                ['Free', '/admin/modules/car/free', '', 'Car']
            ]],
            ['Verification Requests', '/admin/modules/car/verifications', 'icon-clipboard2', 'Car'],
            ['Car Options', '/admin/modules/car/options', 'icon-cog', 'Car'],
        ];
        $carMainMenus = ['Car Main', '', '', 'Car', [
            ['Home', '/', '', 'Car'],
            ['Buy', '/buy', '', 'Car'],
            ['Sell', '/sell', '', 'Car'],
            ['Finance', '/finance', '', 'Car'],
            ['Auction', '/auction', '', 'Car']
        ]];
        $carTopbarMenus = ['Car Topbar', '', '', 'Car', [
            ['About Us', '/about-us', '', 'Car'],
            ['Write wanna buy', '/wanna-buy', '', 'Car']
        ]];
        $carFooterMenus = ['Car Footer', '', '', 'Car', [
            ['About', '/about-us', '', 'Car'],
            ['Write wanna buy', '/wanna-buy', '', 'Car']
        ]];
        $carProfileDropdownMenus = ['Car Profile Dropdown', '', '', 'Car', [
            ['Interested car list', '/my-page/interested-cars', '', 'Car'],
            ['Registration car alert', '/my-page/car-alerts', '', 'Car'],
            ['Sell request', '/my-page/sell-requests', '', 'Car'],
            ['Purchase request', '/my-page/purchase-requests', '', 'Car'],
            ['Mileage', '/my-page/mileage', '', 'Car'],
            ['Coupon', '/my-page/coupon', '', 'Car'],
            ['My profile', '/my-page/profile', '', 'Car'],
        ]];

        $this->iterate($adminMenus, 2, 1);
        $this->iterate([
            $carMainMenus,
            $carTopbarMenus,
            $carFooterMenus,
            $carProfileDropdownMenus,
        ], 1);
    }

    private function iterate($array, $sublevel, $parent = null) {
        for ($i=0; $i < count($array); $i++) {

            $order = $i + 1;

            if (isset($parent)) {
                $order = Menu::where('parent_id', $parent)->count() + 1;
            }

            $menu = $this->insertMenu($array[$i][0], $array[$i][1], $array[$i][2], $array[$i][3], $sublevel, $order, $parent);
            if (array_key_exists(4, $array[$i]) && count($array[$i][4]) > 0) {
                $this->iterate($array[$i][4], $sublevel + 1, $menu->id);
            }
        }
    }

    private function insertMenu($title, $link, $icon, $module, $sublevel, $order, $parent = null) {
        $menu = new Menu();
        $menu->title = $title;
        $menu->link = $link;
        $menu->icon = $icon;
        $menu->module = $module;
        $menu->sublevel = $sublevel;
        $menu->order = $order;
        $menu->parent_id = $parent;
        $menu->save();

        return $menu;
    }
}
