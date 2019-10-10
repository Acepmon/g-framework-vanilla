<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureNissanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Nissan = ['Nissan Patrol/Safari ', 'Nissan Skyline ', 'Nissan Caravan', 'Nissan Pulsar', 'Nissan Maxima', 'Nissan Prairie', 'Nissan Atlas', 'Nissan Micra ', 'Nissan Sentra', 'Nissan Urvan', 'Nissan Pathfinder ',
        'Nissan Cima ', 'Nissan Serena ', 'Nissan Altima', 'Nissan Cube', 'Nissan Elgrand', 'Nissan Navara/Frontier', 'Nissan Sylphy', 'Nissan X-Trail', 'Nissan Murano', 'Nissan Teana', 'Nissan Armada ',
        'Nissan Fuga ', 'Nissan Lafesta', 'Nissan Titan', 'Nissan Note', 'Nissan Livina', 'Nissan Clipper', 'Nissan Latio', 'Nissan Qashqai', 'Nissan Rogue', 'Nissan Versa', 'Nissan GT-R', 'Nissan 370Z Z34 ',
        'Nissan Leaf', 'Nissan NV200', 'Nissan Juke', 'Nissan NV400 ', 'Nissan NV', 'Nissan NV100', 'Nissan NV350', 'Nissan Dayz ', 'Nissan Dayz Roox ', 'Nissan NV300 ', 'Nissan Kicks', 'Nissan Terra'];

        foreach($Nissan as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Nissan',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '18',
                'count' => 0
            ]);
        }
    }
}
