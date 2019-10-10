<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarWheelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Wheels = ['Front', 'Back'];

        foreach($Wheels as &$Wheel){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $Wheel,
                'slug' => $Wheel,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Wheel Drive',
                'description' => $Wheel,
                'parent_id' => 15,
                'count' => 0
            ]);
        }
    }
}
