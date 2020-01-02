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
            'Суудлын' => ['value' => 'Sedan'], 
            'Том тэрэг' => ['value' => 'SUV'], 
            'Тусгай ММ' => ['value' => 'SpecialVehicle'], 
            'Хүнд ММ' => ['value' => 'Truck'], 
            'Ванн' => ['value' => 'Van'], 
            'Автобус' => ['value' => 'Bus']
        ];

        $parent = TaxonomyManager::register('Car Type', 'car', null, ['metaKey' => 'carType']);

        foreach ($carTypes as $type => $metas) {
            TaxonomyManager::register($type, 'car-type', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
