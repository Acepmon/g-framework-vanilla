<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarOptionsSafetyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $safetys = ['Electric parking brake', 'ABS', 'Parking sense : Front', 'Parking Sense : rear', 'Camera : Side', 'Camera : Rear', 'Camera : Front', 'Airbag : Curtains'
        , 'Airbag : Side', 'Passenger’s seat', 'Airbag : Driver’s seat'];

        foreach($safetys as &$safety){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $safety,
                'slug' => $safety,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Safety',
                'description' => 'safety',
                'parent_id' => '12',
                'count' => 0
            ]);
        }
    }
}
