<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Menu;
use App\Group;

class CarGroupMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Attach Car Menus to Administrator Group
        Group::findOrFail(1)->menus()->attach(Menu::where('module', 'Car')->get());

        // Attach System Menus to Car Content Operator Group
        Group::where('title', 'Car Content Operator')->first()->menus()->attach(Menu::where('module', 'Car')->get());
    }
}
