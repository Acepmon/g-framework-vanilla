<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarWheelPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $WheelPosition = ['Right', 'Left'];

        foreach($WheelPosition as &$position){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $position,
                'slug' => $position,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Steering Wheel',
                'description' => $position,
                'count' => 0
            ]);
        }
    }
}
