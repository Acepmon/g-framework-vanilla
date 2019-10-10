<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureBugattiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bugattis = ['Bugatti Veyron', 'Bugatti Type 32', 'Bugatti EB110', 'Bugatti Type 57S Atalante number 57502', 'Bugatti Royale', 'Bugatti Type 101', 'Bugatti Type 46', 
        'Bugatti Type 51', 'Bugatti Type 49', 'Bugatti Type 57', 'Bugatti EB118', 'Bugatti Type 13', 'Bugatti Type 18', 'Bugatti Type 35', 'Bugatti Type 53', 'Bugatti Type 55'
        , 'Bugatti Type 252', 'Bugatti Type 30', 'Bugatti Type 38', 'Bugatti Type 40', 'Bugatti Type 43', 'Bugatti Type 44', 'Bugatti Type 23', 'Bugatti Type 50', 'Bugatti Type 57G'
        , 'Bugatti Type 50B', 'Bugatti Type 251', 'Bugatti Type 37', 'Bugatti Type 39', 'Bugatti Type 29', 'Bugatti 18/3 Chiron', 'Bugatti Type 57S Atalante'];

        $parent = TaxonomyManager::register('Bugatti', 'car-manufacturer');

        foreach ($bugattis as $key => $bugatti) {
            TaxonomyManager::register($bugatti, 'car-bugatti', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
