<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarOptionsGutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Guts = ['Power Door lock', 'Memory seat : driver’s seat', 'Heated Seat: Rear Seat', 'Heated Seat: Driver’s Seat', 'Electric seat : Passenger seat', 'Electric seat : driver’s seat'
        , 'Leather seat', 'Power steering', 'Steering wheel remote control'];

        foreach($Guts as &$Gut){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $Gut,
                'slug' => $Gut,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Guts',
                'description' => 'Guts',
                'parent_id' => '11',
                'count' => 0
            ]);
        }
    }
}
