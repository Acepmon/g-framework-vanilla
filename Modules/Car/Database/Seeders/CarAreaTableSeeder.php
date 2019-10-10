<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Entities\TaxonomyManager;
class CarAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = ['Ulaanbaatar', 'Darkhan', 'Erdenet', 'Arkhangai', 'Bayan-Ulgii', 'Bayankhongor', 'Bulgan', 'Gobi-Altai', 'Gobisumber', 'Darkhan-Uul', 'Dornogobi', 'Dornod'
    , 'Dundgobi', 'Zavkhan', 'Orkhon', 'Uvurkhangai', 'Umnugobi', 'Sukhbaatar', 'Selenge', 'Tuv', 'Uvs', 'Khovd', 'Khuvsgul', 'Khentii'];

    $parent = TaxonomyManager::register('Provinces', 'car');

    foreach ($location as $key => $province) {
        TaxonomyManager::register($province, 'provinces', $parent->term->id);
    }

    TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

    }
}
