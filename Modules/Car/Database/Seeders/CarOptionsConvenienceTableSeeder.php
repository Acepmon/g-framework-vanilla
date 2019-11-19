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
            'Хар хайрцаг' => ['metaKey' => 'optionConvenienceBlackBox'], 
            'Хөшиг : Хойно' => ['metaKey' => 'optionConvenienceBlinderRear'], 
            'AV дэлгэц : Урд' => ['metaKey' => 'optionConvenienceAVMonitorRear'], 
            'AV дэлгэц : Хойд' => ['metaKey' => 'optionConvenienceAVMonitorFront'], 
            'Rain мэдрэгч' => ['metaKey' => 'optionConvenienceRainSenser'], 
            'Автомат гэрэл' => ['metaKey' => 'optionConvenienceAutoLight'], 
            'Bluetooth' => ['metaKey' => 'optionConvenienceBluetooth'], 
            'AUX оролт' => ['metaKey' => 'optionConvenienceAUXTerminal'], 
            'USB оролт' => ['metaKey' => 'optionConvenienceUSBTerminal'], 
            'Газрын зураг' => ['metaKey' => 'optionConvenienceNavigation'], 
            'CD тоглуулагч' => ['metaKey' => 'optionConvenienceCDPlayer'], 
            'Автомат цонх' => ['metaKey' => 'optionConveniencePowerWindow'], 
            'Автомат агааржуулагч' => ['metaKey' => 'optionConvenienceAutoAirCondition'], 
            'Cruise control' => ['metaKey' => 'optionConvenienceCruiseControl'], 
            'Ухаалаг түлхүүр' => ['metaKey' => 'optionConvenienceSmartKey']];

        $parent = TaxonomyManager::register('Convenience', 'car-options');

        foreach ($conveniences as $convenience => $metas) {
            TaxonomyManager::register($convenience, 'car-convenience', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
