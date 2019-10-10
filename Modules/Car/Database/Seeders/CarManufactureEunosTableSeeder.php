<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureEunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eunoss = ['Eunos'];

        $parent = TaxonomyManager::register('Eunos', 'car-manufacturer');

        foreach ($eunoss as $key => $eunos) {
            TaxonomyManager::register($eunos, 'car-eunos', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
