<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarOptionsConvenienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conveniences = [
            'Black box' => ['metaKey' => 'optionConvenienceBlackBox'], 
            'Blinder : rear' => ['metaKey' => 'optionConvenienceBlinderRear'], 
            'AV monitor : Rear' => ['metaKey' => 'optionConvenienceAVMonitorRear'], 
            'AV monitor : Front' => ['metaKey' => 'optionConvenienceAVMonitorFront'], 
            'Rain senser' => ['metaKey' => 'optionConvenienceRainSenser'], 
            'Auto light' => ['metaKey' => 'optionConvenienceAutoLight'], 
            'Bluetooth' => ['metaKey' => 'optionConvenienceBluetooth'], 
            'AUX terminal' => ['metaKey' => 'optionConvenienceAUXTerminal'], 
            'USB Terminal' => ['metaKey' => 'optionConvenienceUSBTerminal'], 
            'Navigation' => ['metaKey' => 'optionConvenienceNavigation'], 
            'CD player' => ['metaKey' => 'optionConvenienceCDPlayer'], 
            'Power window' => ['metaKey' => 'optionConveniencePowerWindow'], 
            'Auto air conditioner' => ['metaKey' => 'optionConvenienceAutoAirCondition'], 
            'Cruise control' => ['metaKey' => 'optionConvenienceCruiseControl'], 
            'Smart Key' => ['metaKey' => 'optionConvenienceSmartKey']];

        $parent = TaxonomyManager::register('Convenience', 'car-options');

        foreach ($conveniences as $convenience => $metas) {
            TaxonomyManager::register($convenience, 'car-convenience', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
