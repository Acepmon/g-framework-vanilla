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
                'title' => 'Changelog',
                'link' => '/admin/changelog',
                'icon' => 'icon-list-unordered',
                'type' => App\Menu::TYPE_MENU,
                'status' => App\Menu::STATUS_PUBLISH,
                'visibility' => App\Menu::VISIBILITY_PUBLIC,
                'order' => 1,
                'sublevel' => 1,
            ]
        ]);
    }
}
