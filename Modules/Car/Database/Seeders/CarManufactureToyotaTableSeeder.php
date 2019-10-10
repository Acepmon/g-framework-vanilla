<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureToyotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $toyota = ['4Runner', 'Allion', 'Alphard', 'Aqua', 'Auris', 'Avensis', 'Belta', 'Brevis', 'Camry', 'Carina', 'Chaser', 'Corolla', 'Corolla Axio', 'Corolla Fielder', 'Corolla Rumion', 
        'Corolla Runx','Corolla Spacio', 'Crown-150', 'Crown-170', 'Crown-180', 'Crown-200', 'Crown Majesta', 'Estima', 'Fortuner', 'Gaia', 'Harrier', 'Hiace', 'Highlander', 
        'Hilux', 'Ipsum', 'Isis', 'Ist', 'Kluger', 'Land Cruiser-100', 'Land Cruiser-105', 'Land Cruiser-200', 'Land Cruiser-70', 'Land Cruiser-80', 'Land Cruiser Cygnus', 
        'Land Cruiser Prado-120', 'Land Cruiser Prado-150', 'Land Cruiser Prado-95', 'Mark2-100', 'Mark2-110', 'Mark X', 'Mark X Zio', 'Noah', 'Passo', 'Passo Settle', 
        'Premio', 'Prius-10', 'Prius-11', 'Prius-20', 'Prius-30', 'Prius-41 Alpha', 'Probox', 'Progres', 'Ractis', 'Raum','Rav4', 'Rush', 'Sai', 'Sienta', 'Succeed', 'Tacoma', 
        'Tundra', 'Vanguard', 'Vellfire', 'Venza', 'Verossa', 'Vitz', 'Voxy', 'Wish'];

        foreach($toyota as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Toyota',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '16',
                'count' => 0
            ]);
        }
    }
}
