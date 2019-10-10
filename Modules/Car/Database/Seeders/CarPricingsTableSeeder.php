<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarPricingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pricings = [''];

        $parent = TaxonomyManager::register('Pricings', 'car-manufacturer');

        foreach ($pricings as $key => $pricing) {
            TaxonomyManager::register($pricing, 'car-pricing', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
