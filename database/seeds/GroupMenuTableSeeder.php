<?php

use Illuminate\Database\Seeder;

use App\Group;
use App\Menu;

class GroupMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrator Group
        Group::findOrFail(1)->menus()->attach(Menu::all());
    }
}
