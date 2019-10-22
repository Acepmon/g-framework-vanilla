<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarTransmissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transmission = ['Auto', 'Semi Auto', 'Manual', 'CVT'];

        $parent = TaxonomyManager::register('Car transmission', 'car', null, ['metaKey' => 'transmission']);

        foreach ($transmission as $key => $type) {
            TaxonomyManager::register($type, 'car-transmission', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
