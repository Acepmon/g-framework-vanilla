<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManCountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manCount = ['4 суудалтай', '6 суудалтай', '8 суудалтай', '10 суудалтай', '12 суудалтай', '14 суудалтай', '16 суудалтай'];

        $parent = TaxonomyManager::register('Man Count', 'car', null, ['metaKey' => 'manCount']);

        foreach ($manCount as $key => $count) {
            TaxonomyManager::register($count, 'car-mancount', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

    }
}
