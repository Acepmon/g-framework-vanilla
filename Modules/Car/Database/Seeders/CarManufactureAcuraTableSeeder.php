<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureAcuraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Acura = ['Acura CL-X', 'Acura ARX-01', 'Acura ARX-02a', 'Acura CDX', 'Acura CL', 'Acura CSX', 'Acura EL', 'Acura ILX', 'Acura Integra', 'Acura Legend', 'Acura MDX', 'Acura NSX'
        , 'Acura RDX', 'Acura RL', 'Acura RLX', 'Acura RSX', 'Acura SLX', 'Acura TL', 'Acura TLX', 'Acura TSX', 'Acura Vigor', 'Acura ZDX', 'Template:Acura'];

        foreach($Acura as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Acura',
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
