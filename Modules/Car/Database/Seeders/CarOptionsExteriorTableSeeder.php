<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarOptionsExteriorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exteriors = ['Rear wiper' => ['metaKey' => 'optionExteriorRearWiper'], 
            'Electric folding side mirror' => ['metaKey' => 'optionExteriorElectricSideMirror'], 
            '4 season tire' => ['metaKey' => 'optionExterior4SeasonTire'], 
            'Aluminum wheel' => ['metaKey' => 'optionExteriorAluminumWheel'], 
            'Sunroof' => ['metaKey' => 'optionExteriorSunroof']];

        $parent = TaxonomyManager::register('Exterior', 'car-options');

        foreach ($exteriors as $exterior => $metas) {
            TaxonomyManager::register($exterior, 'car-exterior', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
