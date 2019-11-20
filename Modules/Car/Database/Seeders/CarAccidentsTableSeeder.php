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
        $accidents = ['Хүнд', 'Хөнгөн'];

        $parent = TaxonomyManager::register('Accident', 'car', null, ['metaKey' => 'accidents']);

        foreach ($accidents as $key => $accident) {
            TaxonomyManager::register($accident, 'car-accident', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

    }
}
