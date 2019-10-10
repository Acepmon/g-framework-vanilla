<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureMitsubishiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mitsubishis = ['Mitsubishi 360', 'Mitsubishi 380', 'Mitsubishi 500', 'Mitsubishi 3000GT', 'Mitsubishi Adventure', 'Mitsubishi Airtrek', 'Mitsubishi Aspire', 'Mitsubishi Attrage', 'Mitsubishi Carisma'
        , 'Mitsubishi Celeste', 'Mitsubishi Champ', 'Mitsubishi Chariot', 'Chrysler Regal', 'Mitsubishi Colt', 'Mitsubishi Colt 11-F', 'Mitsubishi Colt 600', 'Mitsubishi Colt 800'
        , 'Mitsubishi Colt 1000', 'Mitsubishi Colt 1100', 'Mitsubishi Colt 1100F', 'Mitsubishi Colt 1200', 'Mitsubishi Colt 1500', 'Mitsubishi Colt Bakkie', 'Mitsubishi Colt Galant'
        , 'Mitsubishi Colt Rodeo', 'Mitsubishi Colt T120SS', 'Mitsubishi Cordia', 'Mitsubishi Debonair', 'Mitsubishi Delica', 'Mitsubishi Diamante', 'Mitsubishi Dignity', 'Mitsubishi Mirage Dingo'
        , 'Mitsubishi Dion', 'Mitsubishi Eclipse', 'Mitsubishi Eclipse Cross', 'Mitsubishi eK', 'Mitsubishi Emeraude', 'Mitsubishi Endeavor', 'Mitsubishi Eterna', 'Mitsubishi Expo'
        , 'Mitsubishi Expo LRV', 'Mitsubishi Express', 'Mitsubishi Forte', 'Mitsubishi Freeca', 'Mitsubishi FTO', 'Mitsubishi Fuzion', 'Mitsubishi G-Wagon', 'Mitsubishi Galant', 'Mitsubishi Galant Fortis'
        , 'Mitsubishi Galant FTO', 'Mitsubishi Galant GTO', 'Mitsubishi Galant Lambda', 'Mitsubishi Galant VR-4', 'Mitsubishi Go', 'Mitsubishi Grandis', 'Mitsubishi Grunder', 'Mitsubishi GTO'
        , 'Mitsubishi Henry J', 'Mitsubishi i', 'Mitsubishi i-MiEV', 'Mitsubishi Jeep', 'Mitsubishi Jolie', 'Mitsubishi Kuda', 'Mitsubishi L100', 'Mitsubishi L200', 'Mitsubishi L300'
        , 'Mitsubishi Lancer', 'Mitsubishi Lancer (A70)', 'Mitsubishi Lancer Celeste', 'Mitsubishi Lancer Evolution', 'Mitsubishi Lancer Evolution X', 'Mitsubishi Lancer WRC', 'Mitsubishi Legnum'
        , 'Mitsubishi Leo', 'Mitsubishi Lettuce', 'Mitsubishi Libero', 'Mitsubishi Magna', 'Mitsubishi Magnum', 'Mitsubishi Maven', 'Mazda-Go', 'Mitsubishi Mighty Max', 'Mitsubishi Minica'
        , 'Mitsubishi Minicab', 'Mitsubishi Mirage', 'Mitsubishi MiEV Evolution', 'Mitsubishi Mizushima', 'Mitsubishi Model A', 'Mitsubishi Montero', 'Mitsubishi Montero iO', 'Mitsubishi Montero Sport'
        , 'Mitsubishi Nativa', 'Mitsubishi Nimbus', 'Mitsubishi Outlander', 'Mitsubishi Outlander Sport', 'Mitsubishi Pajero', 'Mitsubishi Pajero Evolution', 'Mitsubishi Pajero iO'
        , 'Mitsubishi Pajero Junior', 'Mitsubishi Pajero Mini', 'Mitsubishi Pajero Pinin', 'Mitsubishi Pajero Sport', 'Mitsubishi Pajero TR4', 'Mitsubishi Pinin', 'Mitsubishi Pistachio'
        , 'Mitsubishi Precis', 'Mitsubishi Proudia', 'Mitsubishi Racing Lancer', 'Mitsubishi Raider', 'Mitsubishi Rodeo', 'Mitsubishi RVR', 'Mitsubishi Sapporo', 'Mitsubishi Savrin'
        , 'Mitsubishi Scorpion', 'Mitsubishi Shogun', 'Mitsubishi Shogun Pinin', 'Mitsubishi Shogun Sport', 'Mitsubishi Sigma', 'Mitsubishi Sigma Scorpion', 'Mitsubishi Space Gear'
        , 'Mitsubishi Space Runner', 'Mitsubishi Space Star', 'Mitsubishi Space Wagon', 'Mitsubishi Sportero', 'Mitsubishi Star Wagon', 'Mitsubishi Starion', 'Mitsubishi Storm'
        , 'Mitsubishi Strada', 'Mitsubishi Toppo', 'Mitsubishi Town Bee', 'Mitsubishi Town Box', 'Mitsubishi Towny', 'Mitsubishi Tredia', 'Mitsubishi Triton', 'Mitsubishi Type 73 Light Truck'
        , 'Mitsubishi V3000', 'Mitsubishi Verada', 'Mitsubishi Warrior', 'Mitsubishi Xpander', 'CMC Zinger'];

        $parent = TaxonomyManager::register('Mitsubishi', 'car-manufacturer');

        foreach ($mitsubishis as $key => $mitsubishi) {
            TaxonomyManager::register($mitsubishi, 'car-mitsubishi', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
