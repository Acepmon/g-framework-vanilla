<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureInfinitiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Infiniti = ['Infiniti Q50 (Q50 2.0t Pure, 2.0t Luxe, 3.0t Luxe, 3.0t Sport, Red Sport 400, Hybrid)', 'Infiniti Q60 (Q60 2.0t Pure, 2.0t Luxe, 3.0t Luxe, 3.0t Sport, Red Sport 400)'
        , 'Infiniti Q70 (M25, M30d, M35h, M37/M37x AWD and M56/M56x AWD variations, all sedans)', 'Infiniti QX50 (EX30d and EX37 in Europe)', 'Infiniti QX60 (3.5, Hybrid variant discontinued)'
        , 'Infiniti QX80 (SUV)', 'Infiniti M30 (coupe and convertible) and M35/M45 (sedan)', 'Infiniti Q30', 'Infiniti QX30 (Base, Luxury, Premium, and Sport)', 'Infiniti QX4 (SUV)'
        , 'Infiniti J30 (sedan)', 'Infiniti I30 and I35 (sedan)', 'Infiniti Q40 (sedan)', 'Infiniti Q45 (sedan)', 'Infiniti QX70 (3.7, 3.7 AWD, 5.0 AWD)', 'Infiniti ESQ (rebadged Nissan Juke sold exclusively in China)'
        , 'Infiniti Triant (2003)', 'Infiniti Kuraza (2005)', 'Infiniti Coupe Concept (2006)', 'Infiniti Essence (2009)', 'Infiniti Etherea (2011)', 'Infiniti Emerg-e (2012)'
        , 'Infiniti LE (2012)', 'Infiniti Q80 Inspiration (2014)', 'Infiniti Concept Vision Gran Turismo (2014)', 'Infiniti QX Sport Inspiration (2016)', 'Infiniti Prototype 9 (2017)'
        , 'Infiniti Q Inspiration (2018)', 'Infiniti Prototype 10 (2018)'];

        foreach($Infiniti as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Infiniti',
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
