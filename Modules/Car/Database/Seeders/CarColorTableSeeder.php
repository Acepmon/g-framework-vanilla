<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colour = ['black', 'white-ivory', 'white-pearl', 'silver', 'asphalt-gray', 'red', 'blue', 'blue-dark', 'sea', 'brown', 'bronze', 'green', 'green-light', 'gold', 'copper', 'beige'];

        $parent = TaxonomyManager::register('Color', 'car', null, ['metaKey' => 'colorName']);

        foreach ($colour as $key => $color) {
            TaxonomyManager::register($color, 'car-colors', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

    }
}
