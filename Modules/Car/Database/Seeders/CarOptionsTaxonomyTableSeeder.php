<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarOptionsTaxonomyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = ['Exterior', 'Guts', 'Safety', 'Convenience', 'Clean'];

        $parent = TaxonomyManager::register('Options', 'car');

        foreach ($options as $key => $option) {
            TaxonomyManager::register($option, 'car-options', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

        $this->call(CarOptionsExteriorTableSeeder::class);
        $this->call(CarOptionsGutsTableSeeder::class);
        $this->call(CarOptionsSafetyTableSeeder::class);
        $this->call(CarOptionsConvenienceTableSeeder::class);
        $this->call(CarOptionsCleanTableSeeder::class);
    }
}
