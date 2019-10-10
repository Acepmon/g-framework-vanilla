<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarWheelPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wheelPosition = ['Right', 'Left'];

        $parent = TaxonomyManager::register('WheelPosition', 'car');

        foreach ($wheelPosition as $key => $position) {
            TaxonomyManager::register($position, 'car-wheel-pos', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

        // foreach($WheelPosition as &$position){
        //     $term_id1 = DB::table('terms')->insertGetId([
        //         'name' => $position,
        //         'slug' => $position,
        //     ]);
        //     DB::table('term_taxonomy')->insert([
        //         'term_id' => $term_id1,
        //         'taxonomy' => 'Steering Wheel',
        //         'description' => $position,
        //         'parent_id' => 6,
        //         'count' => 0
        //     ]);
        // }
    }
}
