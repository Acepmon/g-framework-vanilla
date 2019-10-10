<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarOptionsTaxonomyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = ['Exterior', 'Guts', 'Safety', 'Convenience', 'Clean'];

        foreach($options as &$option){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $option,
                'slug' => $option,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Option',
                'description' => 'options',
                'parent_id' => 9,
                'count' => 0
            ]);
        }

        $this->call(CarOptionsExteriorTableSeeder::class);
        $this->call(CarOptionsGutsTableSeeder::class);
        $this->call(CarOptionsSafetyTableSeeder::class);
        $this->call(CarOptionsConvenienceTableSeeder::class);
        $this->call(CarOptionsCleanTableSeeder::class);
    }
}
