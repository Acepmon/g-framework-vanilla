<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CarType = ['Sedan', 'SUV', 'Sport', 'Trucks', 'Vans', 'Bus',];

        foreach($CarType as &$type){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $type,
                'slug' => $type,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Car Type',
                'description' => $type,
                'count' => 0
            ]);
        }
    }
}
