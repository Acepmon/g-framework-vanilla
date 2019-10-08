<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureBuickTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Buick = ['Excelle', 'LaCrosse', 'Regal', 'Cascada', 'Verano', 'Encore', 'Envision', 'Enclave', 'GL8', 'Master Six', 'Century', 'Limited', 'Roadmaster', 'Special', 'Super'
        , 'Skylark', 'Electra', 'Invicta', 'LeSabre', 'Riviera', 'Wildcat', 'Estate', 'Centurion', 'Apollo', 'Skyhawk', 'Somerset', 'Reatta', 'Park Avenue', 'Rendezvous'
        , 'Rainier', 'Terraza', 'Lucerne'];

        foreach($Buick as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Buick',
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
