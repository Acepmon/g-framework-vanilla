<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarOptionsExteriorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Exteriors = ['Rear wiper', 'Electric folding side mirror', '4 season tire', 'Aluminum wheel', 'Sunroof'];

        foreach($Exteriors as &$Exterior){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $Exterior,
                'slug' => $Exterior,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Exterior',
                'description' => 'exterior',
                'parent_id' => '10',
                'count' => 0
            ]);
        }
    }
}
