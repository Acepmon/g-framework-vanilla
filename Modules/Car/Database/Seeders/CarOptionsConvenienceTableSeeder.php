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
        $conveniences = ['Black box', 'Blinder : rear', 'AV monitor : Rear', 'AV monitor : Front', 'Rain senser', 'Auto light', 'Bluetooth', 'AUX terminal', 'USB Terminal'
        , 'Navigation', 'CD player', 'Power window', 'Auto air conditioner', 'Cruise control', 'Smart Key'];

        $parent = TaxonomyManager::register('Convenience', 'car-options');

        foreach ($conveniences as $key => $convenience) {
            TaxonomyManager::register($convenience, 'car-convenience', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
