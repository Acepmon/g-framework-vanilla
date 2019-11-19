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
        $wheelPosition = ['Баруун', 'Зүүн'];

        $parent = TaxonomyManager::register('WheelPosition', 'car', null, ['metaKey' => 'wheelPosition']);

        foreach ($wheelPosition as $key => $position) {
            TaxonomyManager::register($position, 'car-wheel-pos', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

    }
}
