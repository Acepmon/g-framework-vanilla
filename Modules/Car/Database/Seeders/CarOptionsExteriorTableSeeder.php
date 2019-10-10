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
        $exteriors = ['Rear wiper', 'Electric folding side mirror', '4 season tire', 'Aluminum wheel', 'Sunroof'];

        $parent = TaxonomyManager::findTerm('Exterior');

        foreach ($exteriors as $key => $exterior) {
            TaxonomyManager::register($exterior, 'car-exterior', $parent->id);
        }

        // TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
