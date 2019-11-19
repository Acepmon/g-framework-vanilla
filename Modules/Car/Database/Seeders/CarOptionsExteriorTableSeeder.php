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
        $exteriors = ['Хажуу шил арчигч' => ['metaKey' => 'optionExteriorRearWiper'], 
            'Цахилгаан хажуу толь' => ['metaKey' => 'optionExteriorElectricSideMirror'], 
            '4 улирлын дугуй' => ['metaKey' => 'optionExterior4SeasonTire'], 
            'Хөнгөн цагаан дугуй' => ['metaKey' => 'optionExteriorAluminumWheel'], 
            'Дээврийн цонх' => ['metaKey' => 'optionExteriorSunroof']];

        $parent = TaxonomyManager::register('Exterior', 'car-options');

        foreach ($exteriors as $exterior => $metas) {
            TaxonomyManager::register($exterior, 'car-exterior', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
