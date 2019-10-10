<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureAlfaRomeoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alfaRomeos = ['Alfa Romeo Spider', 'Alfa Romeo 8C Competizione', 'Alfa Romeo Brera', 'Alfa Romeo 159', 'Alfa Romeo 105 Series Coupes', 'Alfa Romeo 166', 
        'Alfa Romeo 8C', 'Alfa Romeo 156', 'Alfa Romeo GTV6', 'Alfa Romeo MiTo', 'Alfa Romeo 2600', 'Alfa Romeo 145', 'Alfa Romeo 75', 'Alfa Romeo 147'
        , 'Alfa Romeo 155', 'Alfa Romeo Disco Volante', 'Alfa Romeo 164', 'Alfa Romeo Arna', 'Alfa Romeo Giulia', 'Alfa Romeo Giulietta', 'Alfa Romeo GT', 'Alfa Romeo Tipo 33'
        , 'Alfa Romeo 6C', 'Alfa Romeo GTV and Spider', 'Alfa Romeo Montreal', 'Alfa Romeo 90', 'Alfa Romeo Alfasud', 'Alfa Romeo RM', 'Alfa Romeo Alfa 6', 'Alfa Romeo Alfetta'
        , 'Alfa Romeo Sprint', 'Alfa Romeo SZ', 'Alfa Romeo 1750', 'Alfa Romeo G1', 'Alfa Romeo 1900', 'Alfa Romeo 2000', 'Alfa Romeo Giulia TZ', 'Alfa Romeo Giulietta'
        , 'Alfa Romeo 33', 'Alfa Romeo 33 Stradale', 'Alfa Romeo GTA', 'Alfa Romeo 12C', 'Alfa Romeo P3', 'Alfa Romeo Matta', 'Alfa Romeo RL', 'A.L.F.A 40/60 HP'
        ,'Alfa Romeo Tipo A','A.L.F.A 24 HP','Alfa Romeo 20/30 HP ES Sport','Alfa Romeo Giulietta','Alfa Romeo Gran Sport Quattroruote','Alfa Romeo 33.2','A.L.F.A. 40/60 GP'
        ,'Alfa Romeo P1','Alfa Romeo 169','Alfa Romeo 20/30 HP','Alfa Romeo P2','Alfa Romeo Kamal','Alfa Romeo Tipo 308','Alfa Romeo Tipo 512','Alfa Romeo Scighera'];

        $parent = TaxonomyManager::register('Alfa Romeo', 'car-manufacturer');

        foreach ($alfaRomeos as $key => $alfaRomeo) {
            TaxonomyManager::register($alfaRomeo, 'car-alfa-romeo', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
