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
                "title" => "Car Content Operator",
                "description" => "Management of Car Contents",
                "type" => Group::TYPE_DYNAMIC,
                "parent_id" => 2
            ],
            [
                "title" => "Auto Dealer",
                "description" => "This is auto dealer",
                "type" => Group::TYPE_DYNAMIC,
                "parent_id" => null
            ]
        ]);
        $damoa = Group::where('title', 'Damoa')->first();
        $damoa->parent_id = Group::where('title', 'Auto Dealer')->first()->id;
        $damoa->save();
    }
}
