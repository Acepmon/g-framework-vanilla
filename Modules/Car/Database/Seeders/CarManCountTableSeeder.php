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
        $manCount = ['4 суудалтай', '5 суудалтай', '7 суудалтай', '9 суудалтай', '11 суудалтай', '13 суудалтай', '15 суудалтай', 'Шууд удирдлагын'];

        $parent = TaxonomyManager::register('Man Count', 'car', null, ['metaKey' => 'manCount']);

        foreach ($manCount as $key => $count) {
            TaxonomyManager::register($count, 'car-mancount', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

    }
}
