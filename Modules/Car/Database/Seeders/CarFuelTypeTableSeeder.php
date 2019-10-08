<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarFuelTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $FuelType = ['Gasoline', 'Diesel', 'LPG', 'Gasoline + Electricity', 'LPG + Electricity', 'Gasoline + CNG', 'Diesel + Electricity', 'Electricity', 'LNG'];

        foreach($FuelType as &$fuel){
            $term_id1 = DB::table('terms')->insertGetId([
                'name' => $fuel,
                'slug' => $fuel,
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id1,
                'taxonomy' => 'Fuel',
                'description' => $fuel,
                'count' => 0
            ]);
        }
    }
}
