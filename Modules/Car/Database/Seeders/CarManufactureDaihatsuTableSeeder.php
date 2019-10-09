<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureDaihatsuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Daihatsu = ['Daihatsu Altis', 'Daihatsu Applause', 'Daihatsu Atrai', 'Daihatsu Ayla', 'Daihatsu Be-go', 'Daihatsu Bee', 'Daihatsu Boon', 'Daihatsu Boon Luminas', 'Daihatsu Cast'
        , 'Daihatsu Ceria', 'Daihatsu Charade', 'Daihatsu Charade Centro', 'Daihatsu Charmant', 'Daihatsu Compagno', 'Daihatsu Consorte', 'Daihatsu Copen', 'Daihatsu Costa', 'Daihatsu Cuore'
        , 'Daihatsu Delta', 'Daihatsu Domino', 'Daihatsu Espass', 'Daihatsu Esse', 'Daihatsu Extol', 'Daihatsu Fellow', 'Daihatsu Fellow Max', 'Daihatsu Feroza', 'Daihatsu Fourtrak'
        , 'Daihatsu Gran Max', 'Daihatsu Gran Move', 'Daihatsu Grand Move', 'Daihatsu Handi', 'Daihatsu Handivan', 'Daihatsu Hi-Max', 'Daihatsu Hijet', 'Daihatsu Leeza'
        , 'Daihatsu Luxio', 'Daihatsu Materia', 'Daihatsu Max', 'Daihatsu Mebius', 'Daihatsu Midget', 'Daihatsu Mira', 'Daihatsu Mira Cocoa', 'Daihatsu Mira e:S', 'Daihatsu Mira Gino'
        , 'Daihatsu Mira Tocot', 'Daihatsu Move', 'Daihatsu Move Conte', 'Daihatsu Move Latte', 'Daihatsu Naked', 'Daihatsu New Line', 'Daihatsu Opti', 'Daihatsu P5', 'Daihatsu Pyzar'
        , 'Daihatsu Rocky', 'Daihatsu Rugger', 'Daihatsu Scat', 'Daihatsu Sigra', 'Daihatsu Sirion', 'Daihatsu Sonica', 'Daihatsu Sportrak', 'Daihatsu Storia', 'Daihatsu Taft'
        , 'Daihatsu Tanto', 'Daihatsu Tanto Exe', 'Daihatsu Taruna', 'Daihatsu Terios', 'Daihatsu Thor', 'Daihatsu Trevis', 'Daihatsu UFE-III', 'Daihatsu Wake', 'Daihatsu Wildcat'
        , 'Daihatsu Xenia', 'Daihatsu YRV', 'Daihatsu Zebra', 'Template:Daihatsu Europe timeline', 'Template:Daihatsu timeline', 'Template:Daihatsu timeline pre-1980'];

        foreach($Daihatsu as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Daihatsu',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '17',
                'count' => 0
            ]);
        }
    }
}
