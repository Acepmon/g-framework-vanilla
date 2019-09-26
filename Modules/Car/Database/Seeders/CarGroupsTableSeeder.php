<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Group;
use DB;

class CarGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('groups')->insert([
            [
                "title" => "Auto Dealer",
                "description" => "This is auto dealer",
                "type" => Group::TYPE_DYNAMIC
            ]
        ]);
    }
}
