<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureKiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Kia = ['Cadenza/K7', 'Ceed/Ceed SW/pro_ceed', 'Forte/Cerato/K3', 'K4', 'K9/K900/Quoris', 'Optima/Magentis/K5', 'Pegas', 'Picanto/Morning', 'Ray'
        , 'Rio/Rio5/Pride', 'Soul', 'Stinger', 'Stonic', 'Carens/Rondo', 'Carnival/Sedona', 'Mohave/Borrego', 'Sorento', 'Sportage', 'Pregio', 'Telluride'
        , 'Seltos', 'AM928 – KMC only', 'Granbird – KMC only', 'Bongo, also sold as K2700/Strong/3000S/2500TCI', 'K4000s – KMC only', 'Kia ceed Hybrid'
        , 'Kia Niro Hybrid Utility Vehicle', 'Kia Ray Plug-in hybrid', 'Kia Soul EV', 'Kia Optima Hybrid'];

        foreach($Kia as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Kia',
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
