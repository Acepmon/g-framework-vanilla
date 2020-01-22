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
            'Ванн' => ['value' => 'Van'], 
            'Хүнд ММ' => ['value' => 'Truck'], 
            'Автобус' => ['value' => 'Bus'],
            'Тусгай ММ' => ['value' => 'Special']
        ];

        $parent = TaxonomyManager::register('Car Type', 'car', null, ['metaKey' => 'carType']);

        foreach ($carTypes as $type => $metas) {
            TaxonomyManager::register($type, 'car-type', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
