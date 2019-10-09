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
        $this->call(CarOptionsTaxonomyTableSeeder::Class);
        $this->call(CarTypeTableSeeder::Class);
        $this->call(CarManufactureTableSeeder::Class);
        $this->call(CarFuelTypeTableSeeder::Class);
        $this->call(CarTransmissionTableSeeder::Class);
    }
}
