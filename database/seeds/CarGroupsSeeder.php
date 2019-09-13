<?php

use Illuminate\Database\Seeder;

class CarGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            [
                "title" => "Auto Dealer",
                "description" => "This is auto dealer",
                "type" => App\Group::TYPE_DYNAMIC
            ],
            [
                "title" => "Driver",
                "description" => "Basic user",
                "type" => App\Group::TYPE_DYNAMIC
            ],
        ]);
    }
}
