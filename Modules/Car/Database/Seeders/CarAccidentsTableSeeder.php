<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarAccidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accidents = ['Unassuming', 'Simple exchange', 'Simple accident'];

        $parent = TaxonomyManager::register('Accident', 'car');

        foreach ($accidents as $key => $accident) {
            TaxonomyManager::register($accident, 'Accident', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

        // foreach($accidents as &$accident){
        //     $term_id1 = DB::table('terms')->insertGetId([
        //         'name' => $accident,
        //         'slug' => $accident,
        //     ]);
        //     DB::table('term_taxonomy')->insert([
        //         'term_id' => $term_id1,
        //         'taxonomy' => 'Accident',
        //         'description' => $accident,
        //         'parent_id' => 7,
        //         'count' => 0
        //     ]);
        // }
    }
}
