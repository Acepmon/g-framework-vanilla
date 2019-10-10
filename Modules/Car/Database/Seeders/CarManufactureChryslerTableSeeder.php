<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureChryslerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Chryslers = ['Chrysler 300', 'Chrysler Pacifica (minivan)', 'Chrysler 150', 'Chrysler 160/180', 'Chrysler 200', 'Chrysler 300 letter series', 'Chrysler 300M', 'Chrysler 300 non-letter series', 
        'Chrysler Airflow', 'Chrysler Airstream', 'Chrysler Alpine', 'Chrysler Aspen', 'Chrysler Avenger', 'Chrysler Centura (Australia)', 'Chrysler Charger (Australia)', 'Chrysler by Chrysler (Australia)', 
        'Chrysler Cirrus', 'Chrysler Colt (South Africa)', 'Chrysler Concorde', 'Chrysler Conquest', 'Chrysler Cordoba', 'Chrysler Crossfire', 'Chrysler D-50 (Australia)', 'Chrysler Daytona (Canada)', 
        'Chrysler Delta (UK and Ireland)', 'Chrysler Drifter (Australia)', 'Chrysler Dynasty (Canada)', 'Chrysler Executive', 'Chrysler Fifth Avenue', 'Chrysler Galant', 'Chrysler Horizon (Europe)',
        'Chrysler Hunter', 'Chrysler Imperial', 'Chrysler Imperial Parade Phaeton', 'Chrysler Intrepid (Canada)', 'Chrysler L300 Express (Australia)', 'Chrysler Lancer (Australia)', 
        'Chrysler Laser', 'Chrysler LeBaron', 'Chrysler LHS', 'Chrysler Newport', 'Chrysler Neon (Australia, Europe and Japan)', 'Chrysler New Yorker', 'Chrysler New Yorker Fifth Avenue', 
        'Chrysler Pacifica (crossover)', 'Chrysler Prowler', 'Chrysler PT Cruiser', 'Chrysler Regal (Australia)', 'Chrysler Plainsman (Australia)', 'Chrysler Royal', 
        'Chrysler Royal (Australia)', 'Chrysler Saratoga', 'Chrysler Saratoga, Canada non-letter 300 series', 'Chrysler Sebring', 'Chrysler Sigma (Australia)', 'Chrysler Stratus (Canada and Europe)'
        , 'Chrysler Sunbeam', 'Chrysler TC by Maserati', 'Chrysler Touring', 'Chrysler Town and Country', 'Chrysler Turbine Car (Experimental gas turbine–powered car)', 
        'Chrysler Valiant (Australia, New Zealand and South Africa)', 'Chrysler VIP (Australia)', 'Chrysler Viper (Europe)', 'Chrysler Vogue (South Africa)', 
        'Chrysler Voyager/Grand Voyager, US', 'Chrysler Voyager, Europe', 'Chrysler Wayfarer (Australia)', 'Chrysler Windsor', 'Chrysler Windsor as Chrysler of Canadas version of Newport', 
        'Chrysler Ypsilon'];

        $parent = TaxonomyManager::register('Chrysler', 'car-manufacturer');

        foreach ($Chryslers as $key => $Chrysler) {
            TaxonomyManager::register($Chrysler, 'car-chrysler', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
