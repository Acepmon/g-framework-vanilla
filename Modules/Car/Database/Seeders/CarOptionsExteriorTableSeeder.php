<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarOptionsExteriorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Exteriors = ['Rear wiper', 'Electric folding side mirror', '4 season tire', 'Aluminum wheel', 'Sunroof'];

        $parent = TaxonomyManager::findTaxonomy('car-options');

        foreach ($options as $key => $option) {
            TaxonomyManager::register($option, 'car-exterior', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
