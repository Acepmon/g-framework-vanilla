<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SpecialVehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialVehicles = ['Excavator', 'Dozer', 'Wjeel Loader', 'Tower Crane', 'Cargo Crane', 'Pork Lift', 'Tractor', 'Concrete Mixer Truck', 'Concrete boom pump', 
        'Blasthole drill rigs', 'Tow Truck', 'Tank Lorry', 'Ladder Truck', 'Camping Car', 'Others'];

        $parent = TaxonomyManager::register('Special Vehicle Type', 'car', null, ['metaKey' => 'specialVehicle']);

        foreach ($specialVehicles as $key => $specialVehicle) {
            TaxonomyManager::register($specialVehicle, 'truck-size', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
