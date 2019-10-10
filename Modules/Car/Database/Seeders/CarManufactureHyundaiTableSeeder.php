<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureHyundaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hyundais = ['Hyundai Elantra', 'Hyundai Sonata', 'Hyundai Accent', 'Hyundai Tucson', 'Hyundai Santa Fe', 'Hyundai Entourage', 'Hyundai Grandeur'
        , 'Hyundai Genesis', 'Hyundai Genesis Coupe', 'Hyundai Veracruz', 'Hyundai Equus', 'Hyundai Getz', 'Hyundai Pony', 'Hyundai i10'
        , 'Hyundai Lavita', 'Hyundai Scoupe', 'Hyundai Terracan', 'Hyundai Tiburon', 'Hyundai Trajet', 'Hyundai Excel', 'Hyundai i20'
        , 'Hyundai Aero City', 'Hyundai Dynasty', 'Hyundai Stellar', 'Hyundai Verna', 'Hyundai Grace', 'Hyundai Marcia', 'Hyundai Atos'
        , 'Hyundai Portico', 'Hyundai Santamo', 'Hyundai i30', 'Hyundai Universe', 'Hyundai Global 900', 'Hyundai Aero', 'Hyundai Aero Town'
        , 'Hyundai County', 'Hyundai Mighty II', 'Hyundai e-Mighty', 'Hyundai Trago', 'Hyundai 8 to 25-ton truck', 'Hyundai Super Truck', 'Hyundai Super Truck Medium'
        , 'Hyundai Chorus', 'Hyundai Mega Truck', 'Hyundai Mighty', 'Hyundai New Power Truck', 'Hyundai Porter', 'Hyundai Galloper', 'Hyundai Sonata Embera'
        , 'Hyundai HED-5', 'Hyundai Veloster'];

        $parent = TaxonomyManager::register('Hyundai', 'car-manufacturer');

        foreach ($hyundais as $key => $hyundai) {
            TaxonomyManager::register($hyundai, 'car-hyundai', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
