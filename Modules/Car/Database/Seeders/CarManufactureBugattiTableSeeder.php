<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureBugattiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Bugatti = ['Bugatti Veyron', 'Bugatti Type 32', 'Bugatti EB110', 'Bugatti Type 57S Atalante number 57502', 'Bugatti Royale', 'Bugatti Type 101', 'Bugatti Type 46', 
        'Bugatti Type 51', 'Bugatti Type 49', 'Bugatti Type 57', 'Bugatti EB118', 'Bugatti Type 13', 'Bugatti Type 18', 'Bugatti Type 35', 'Bugatti Type 53', 'Bugatti Type 55'
        , 'Bugatti Type 252', 'Bugatti Type 30', 'Bugatti Type 38', 'Bugatti Type 40', 'Bugatti Type 43', 'Bugatti Type 44', 'Bugatti Type 23', 'Bugatti Type 50', 'Bugatti Type 57G'
        , 'Bugatti Type 50B', 'Bugatti Type 251', 'Bugatti Type 37', 'Bugatti Type 39', 'Bugatti Type 29', 'Bugatti 18/3 Chiron', 'Bugatti Type 57S Atalante'];

        foreach($Bugatti as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Bugatti',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }
    }
}
