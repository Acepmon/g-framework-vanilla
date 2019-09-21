<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Group;
use DB;

class CarGroupsSeeder extends Seeder
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
            ],
            [
                "title" => "Driver",
                "description" => "Basic user",
                "type" => Group::TYPE_DYNAMIC
            ],
        ]);
    }
}
