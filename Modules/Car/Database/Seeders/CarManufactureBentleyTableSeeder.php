<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureBentleyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Bentley = ['Bentley 3 Litre', 'Bentley 3.5 Litre', 'Bentley 4 Litre', 'Bentley 4½ Litre', 'Bentley Speed Six', 'Bentley 8 Litre', 'Bentley Arnage', 'Bentley Azure', 'Bentley Bentayga'
        , 'Blue Train Bentley', 'Bentley Brooklands', 'Bentley Brooklands Coupé', 'Bentley Continental', 'Bentley Flying Spur (disambiguation)', 'Bentley Flying Spur (2005)'
        , 'Bentley Continental GT', 'Bentley Continental GTC', 'Bentley Continental R', 'Bentley Continental S', 'Bentley Continental T', 'Bentley Corniche', 'Bentley Eight'
        , 'Bentley Mark V', 'Bentley Mark VI', 'Bentley Mulsanne (1980–92)', 'Bentley Mulsanne (2010)', 'Bentley R Type', 'Bentley S1', 'Bentley S2', 'Bentley S3'
        , 'Bentley State Limousine', 'Bentley T-series', 'Bentley Turbo R', 'Bentley Turbo RT', 'Bentley Turbo S'];

        foreach($Bentley as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Bentley',
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
