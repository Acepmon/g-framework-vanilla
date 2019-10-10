<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarOptionsCleanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cleans = ['Woman driver', 'No smoking', 'One person drive'];

        $parent = TaxonomyManager::register('Clean', 'car-options');

        foreach ($cleans as $key => $clean) {
            TaxonomyManager::register($clean, 'car-clean', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
