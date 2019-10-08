<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufacturePorscheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Porsche = ['Porsche 356 (1948–1965)', 'Porsche 550 (1953–1957)', 'Porsche 718 (1957–1962)', 'Porsche 904 (1963–1965)', 'Porsche 906 (1965–1966)', 'Porsche 911 (1963–present)'
        , 'Porsche 912 (1965–1969, 1976)', 'Porsche 914 (1969–1976)', 'Porsche 924 (1976–1988)', 'Porsche 928 (1977–1995)', 'Porsche 930 (1974–1989)', 'Porsche 944 (1981–1991)'
        , 'Porsche 959 (1986–1988, 1992–1993)', 'Porsche 968 (1992–1995)', 'Porsche Boxster (1996–present)', 'Porsche Cayenne (2002–present)', 'Porsche Carrera GT (2003–2007)'
        , 'Porsche Cayman (2005–present)', 'Porsche Panamera (2009–present)', 'Porsche 918 Spyder (2013–2015)', 'Porsche Macan (2014–present)', 'Porsche Taycan (2019–present)'];

        foreach($Porsche as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Porsche',
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
