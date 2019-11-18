<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarDoorCountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $doorCount = ['2', '3', '4', '5'];

        foreach ($doorCount as $key => $count) {
            TaxonomyManager::register($count, 'door-count');
        }

    }
}
