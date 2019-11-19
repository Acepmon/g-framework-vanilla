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
            'Мэдрэгч : Урд' => ['metaKey' => 'optionSafetyParkingSenseFront'], 
            'Мэдрэгч : Хойд' => ['metaKey' => 'optionSafetyParkingSenseRear'], 
            'Камер : Хажуу' => ['metaKey' => 'optionSafetyCameraSide'], 
            'Камер : Хойд' => ['metaKey' => 'optionSafetyCameraRear'], 
            'Камер : Урд' => ['metaKey' => 'optionSafetyCameraFront'], 
            'Аюулгүйн дэр: Хөшиг' => ['metaKey' => 'optionSafetyAirbagCurtains'], 
            'Аюулгүйн дэр: Хажуугийн' => ['metaKey' => 'optionSafetyAirbagSide'], 
            'Аюулгүйн дэр: Зорчигчдын суудал' => ['metaKey' => 'optionSafetyAirbagPassengerSeat'], 
            'Airbag: Жолоочийн суудал' => ['metaKey' => 'optionSafetyAirbagDriverSeat']];

        $parent = TaxonomyManager::register('Safety', 'car-options');

        foreach ($safeties as $safety => $metas) {
            TaxonomyManager::register($safety, 'car-safety', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
