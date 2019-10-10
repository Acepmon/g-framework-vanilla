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
        $safeties = ['Electric parking brake', 'ABS', 'Parking sense : Front', 'Parking Sense : rear', 'Camera : Side', 'Camera : Rear', 'Camera : Front', 'Airbag : Curtains'
        , 'Airbag : Side', 'Passenger’s seat', 'Airbag : Driver’s seat'];

        $parent = TaxonomyManager::findTerm('Safety');

        foreach ($safeties as $key => $safety) {
            TaxonomyManager::register($safety, 'car-safety', $parent->id);
        }

        // TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}