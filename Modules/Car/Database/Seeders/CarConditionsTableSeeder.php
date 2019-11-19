<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $conditions = ['Хуучин', 'Шинэ', 'Орж ирсэн'];

        $parent = TaxonomyManager::register('Car Conditions', 'car', null, ['metaKey' => 'carCondition']);

        foreach ($conditions as $key => $condition) {
            TaxonomyManager::register($condition, 'car-conditions', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
