<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureBuickTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buicks = ['Excelle', 'LaCrosse', 'Regal', 'Cascada', 'Verano', 'Encore', 'Envision', 'Enclave', 'GL8', 'Master Six', 'Century', 'Limited', 'Roadmaster', 'Special', 'Super'
        , 'Skylark', 'Electra', 'Invicta', 'LeSabre', 'Riviera', 'Wildcat', 'Estate', 'Centurion', 'Apollo', 'Skyhawk', 'Somerset', 'Reatta', 'Park Avenue', 'Rendezvous'
        , 'Rainier', 'Terraza', 'Lucerne'];

        $parent = TaxonomyManager::register('Buick', 'car-manufacturer');

        foreach ($buicks as $key => $buick) {
            TaxonomyManager::register($buick, 'car-buick', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
