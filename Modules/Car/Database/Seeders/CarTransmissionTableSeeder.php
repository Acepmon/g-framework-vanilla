<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarTransmissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Transmission = ['Auto', 'Semi Auto', 'Manual', 'CVT'];

        foreach($Transmission as &$trans){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $trans,
                'slug' => $trans,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Transmission',
                'description' => $trans,
                'parent_id' => 4,
                'count' => 0
            ]);
        }
    }
}
