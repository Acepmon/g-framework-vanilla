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
        $guts = ['Цхаилгаан цоож' => ['metaKey' => 'optionGutsPowerDoorLock'], 
            'Авто суудал : Жолоочын суудал' => ['metaKey' => 'optionGutsMemorySeatDriverSeat'], 
            'Суудал халаагч: Хойд суудал' => ['metaKey' => 'optionGutsHeatedSeatRearSeat'], 
            'Суудал халаагч: Жолоочын суудал' => ['metaKey' => 'optionGutsHeatedSeatDriverSeat'], 
            'Цахилгаан суудал : Зорчигчын суудал' => ['metaKey' => 'optionGutsElectricSeatPassengerSeat'], 
            'Цахилгаан суудал : Жолоочын суудал' => ['metaKey' => 'optionGutsElectricSeatDriverSeat'], 
            'Арьсан суудал' => ['metaKey' => 'optionGutsLeatherSeat'], 
            'Хүрдний удирдлага' => ['metaKey' => 'optionGutsPowerSteering'], 
            'Алсын зайны хүрдний удирдлага' => ['metaKey' => 'optionGutsSteerRemoteControl']];

        $parent = TaxonomyManager::register('Guts', 'car-options');

        foreach ($guts as $gut => $metas) {
            TaxonomyManager::register($gut, 'car-guts', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
