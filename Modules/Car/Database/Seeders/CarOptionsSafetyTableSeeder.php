<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarOptionsSafetyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $safeties = ['Electric parking brake' => ['metaKey' => 'optionSafetyElectricParkingBrake'], 
            'ABS' => ['metaKey' => 'optionSafetyABS'], 
            'Parking sense : Front' => ['metaKey' => 'optionSafetyParkingSenseFront'], 
            'Parking Sense : rear' => ['metaKey' => 'optionSafetyParkingSenseRear'], 
            'Camera : Side' => ['metaKey' => 'optionSafetyCameraSide'], 
            'Camera : Rear' => ['metaKey' => 'optionSafetyCameraRear'], 
            'Camera : Front' => ['metaKey' => 'optionSafetyCameraFront'], 
            'Airbag : Curtains' => ['metaKey' => 'optionSafetyAirbagCurtains'], 
            'Airbag : Side' => ['metaKey' => 'optionSafetyAirbagSide'], 
            'Passenger’s seat' => ['metaKey' => 'optionSafetyAirbagPassengerSeat'], 
            'Airbag : Driver’s seat' => ['metaKey' => 'optionSafetyAirbagDriverSeat']];

        $parent = TaxonomyManager::register('Safety', 'car-options');

        foreach ($safeties as $safety => $metas) {
            TaxonomyManager::register($safety, 'car-safety', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
