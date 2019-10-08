<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarTaxonomyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CarOptionsTaxonomyTableSeeder::class);
        $this->call(CarTypeTableSeeder::class);
        $this->call(CarManufactureTableSeeder::class);
        $this->call(CarFuelTypeTableSeeder::class);
        $this->call(CarTransmissionTableSeeder::class);
    }
}
