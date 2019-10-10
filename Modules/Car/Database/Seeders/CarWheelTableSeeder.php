<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarWheelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wheels = ['Front', 'Back'];

        $parent = TaxonomyManager::register('Wheel', 'car');

        foreach ($wheels as $key => $wheel) {
            TaxonomyManager::register($wheel, 'car-wheel', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

        // foreach($Wheels as &$Wheel){
        //     $term_id5 = DB::table('terms')->insertGetId([
        //         'name' => $Wheel,
        //         'slug' => $Wheel,
        //     ]);
        //     DB::table('term_taxonomy')->insert([
        //         'term_id' => $term_id5,
        //         'taxonomy' => 'Wheel Drive',
        //         'description' => $Wheel,
        //         'parent_id' => 15,
        //         'count' => 0
        //     ]);
        // }
    }
}
