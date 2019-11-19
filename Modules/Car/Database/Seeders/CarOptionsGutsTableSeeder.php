<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarOptionsGutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guts = ['Хаалга Автомагч түгжигч' => ['metaKey' => 'optionGutsPowerDoorLock'], 
            'Суудал сануулагч' => ['metaKey' => 'optionGutsMemorySeatDriverSeat'], 
            'Зорчигчдын суудал халах' => ['metaKey' => 'optionGutsHeatedSeatRearSeat'], 
            'Жолоочийн суудал халах' => ['metaKey' => 'optionGutsHeatedSeatDriverSeat'], 
            'Зорчигчдын суудал хөрөх' => ['metaKey' => 'optionGutsElectricSeatPassengerSeat'], 
            'Жолоочийн суудал хөрөх' => ['metaKey' => 'optionGutsElectricSeatDriverSeat'], 
            'Савхин суудал' => ['metaKey' => 'optionGutsLeatherSeat'], 
            'Залуурын удирдлага' => ['metaKey' => 'optionGutsPowerSteering'], 
            'Автомат жолоодлого' => ['metaKey' => 'optionGutsSteerRemoteControl']];

        $parent = TaxonomyManager::register('Guts', 'car-options');

        foreach ($guts as $gut => $metas) {
            TaxonomyManager::register($gut, 'car-guts', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
