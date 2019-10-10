<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarAccidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accidents = ['Unassuming', 'Simple exchange', 'Simple accident'];

        foreach($accidents as &$accident){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $accident,
                'slug' => $accident,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Accident',
                'description' => $accident,
                'parent_id' => 7,
                'count' => 0
            ]);
        }
    }
}
