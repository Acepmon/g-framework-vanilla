<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManCountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manCount = ['Four seater', '5 passengers', '7 passengers', '9 passengers', '11 passengers', '13 passengers', '15 passengers', 'Direct input'];

        $parent = TaxonomyManager::register('Man Count', 'car');

        foreach ($manCount as $key => $count) {
            TaxonomyManager::register($count, 'car-mancount', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

        // foreach($manCount as &$seat){
        //     $term_id1 = DB::table('terms')->insertGetId([
        //         'name' => $seat,
        //         'slug' => $seat,
        //     ]);
        //     DB::table('term_taxonomy')->insert([
        //         'term_id' => $term_id1,
        //         'taxonomy' => 'Seat',
        //         'description' => $seat,
        //         'parent_id' => 8,
        //         'count' => 0
        //     ]);
        // }
    }
}
