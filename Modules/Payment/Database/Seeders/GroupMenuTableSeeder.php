<?php

namespace Modules\Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Menu;
use App\Group;

class GroupMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Attach Payment Menus to Administrator Group
        Group::findOrFail(1)->menus()->attach(Menu::where('module', 'Payment')->get());
    }
}
