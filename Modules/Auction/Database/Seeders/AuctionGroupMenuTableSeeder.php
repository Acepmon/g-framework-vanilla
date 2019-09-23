<?php

namespace Modules\Auction\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Group;
use App\Menu;

class AuctionGroupMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Administrator Menus;
        Group::findOrFail(1)->menus()->attach(Menu::where('module', 'Auction')->get());
    }
}
