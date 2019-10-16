<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarAdvantagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $advantages = ['Woman driver', 'No smoking', 'One person drive'];

        foreach ($advantages as $key => $advantage) {
            TaxonomyManager::register($advantage, 'car-advantages');
        }
    }
}