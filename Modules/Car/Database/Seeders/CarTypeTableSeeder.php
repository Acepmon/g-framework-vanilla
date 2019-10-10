<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carTypes = ['Sedan', 'SUV', 'Sport', 'Trucks', 'Vans', 'Bus',];

        $parent = TaxonomyManager::register('Car Type', 'car');

        foreach ($carTypes as $key => $type) {
            TaxonomyManager::register($type, 'car-type', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
