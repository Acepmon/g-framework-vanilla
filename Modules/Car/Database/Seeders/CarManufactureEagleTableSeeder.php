<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureEagleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eagles = ['Eagle1', 'Eagle2'];

        $parent = TaxonomyManager::register('Eagle', 'car-manufacturer');

        foreach ($eagles as $key => $eagle) {
            TaxonomyManager::register($eagle, 'car-eagle', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
