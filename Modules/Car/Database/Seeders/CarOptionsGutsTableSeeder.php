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
        $guts = ['Power Door lock' => ['metaKey' => 'optionGutsPowerDoorLock'], 
            'Memory seat : driver’s seat' => ['metaKey' => 'optionGutsMemorySeatDriverSeat'], 
            'Heated Seat: Rear Seat' => ['metaKey' => 'optionGutsHeatedSeatRearSeat'], 
            'Heated Seat: Driver’s Seat' => ['metaKey' => 'optionGutsHeatedSeatDriverSeat'], 
            'Electric seat : Passenger seat' => ['metaKey' => 'optionGutsElectricSeatPassengerSeat'], 
            'Electric seat : driver’s seat' => ['metaKey' => 'optionGutsElectricSeatDriverSeat'], 
            'Leather seat' => ['metaKey' => 'optionGutsLeatherSeat'], 
            'Power steering' => ['metaKey' => 'optionGutsPowerSteering'], 
            'Steering wheel remote control' => ['metaKey' => 'optionGutsSteerRemoteControl']];

        $parent = TaxonomyManager::register('Guts', 'car-options');

        foreach ($guts as $gut => $metas) {
            TaxonomyManager::register($gut, 'car-guts', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
