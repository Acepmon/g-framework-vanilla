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
        $carTypes = [
            'Sedan' => ['value' => 'Суудлын'], 
            'SUV' => ['value' => 'Том тэрэг'], 
            'Sport' => ['value' => 'Спорт'], 
            'Truck' => ['value' => 'Ачааны машин'], 
            'Van' => ['value' => 'Ванн'], 
            'Bus' => ['value' => 'Автобус']
        ];

        $parent = TaxonomyManager::register('Car Type', 'car', null, ['metaKey' => 'carType']);

        foreach ($carTypes as $type => $metas) {
            TaxonomyManager::register($type, 'car-type', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
