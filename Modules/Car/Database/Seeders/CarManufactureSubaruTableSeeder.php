<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureSubaruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subarus = ['Subaru 360', 'Subaru 450', 'Subaru 1000', 'Subaru 1500', 'Subaru 1600', 'Subaru Alcyone SVX', 'Subaru Alcyone', 'Subaru Ascent', 'Subaru B9sc', 'Subaru Baja', 'Subaru Bighorn'
        , 'Subaru BRAT', 'Subaru Brumby', 'Subaru BRZ', 'Subaru BRZ Concept STI', 'Subaru Chiffon', 'Subaru Dex', 'Subaru Elaion', 'Subaru Exiga', 'Subaru FF-1 Star', 'Subaru Fiori'
        , 'Subaru Forester', 'Subaru G', 'Subaru G3X Justy', 'Subaru Impreza', 'Subaru Impreza (second generation)', 'Subaru Justy', 'Subaru Legacy', 'Subaru Legacy (first generation)'
        , 'Subaru Legacy (second generation)', 'Subaru Legacy (third generation)', 'Subaru Legacy (fourth generation)', 'Subaru Legacy (fifth generation)', 'Subaru Legacy (sixth generation)'
        , 'Subaru Legacy (seventh generation)', 'Subaru Leone', 'Subaru Levorg', 'Subaru Liberty', 'Subaru Liberty Exiga', 'Subaru Loyale', 'Subaru Lucra', 'Subaru Mini Jumbo', 'Subaru Outback'
        , 'Subaru Outback Sport', 'Subaru Pleo', 'Prodrive P2', 'Subaru R-2', 'Subaru R1', 'Subaru R1e', 'Subaru R2', 'Subaru Rex', 'Subaru Sambar', 'Subaru Shifter', 'Subaru Stella'
        , 'Subaru - Elten', 'Subaru Sumo', 'Subaru Traviq', 'Subaru Trezia', 'Subaru Tribeca', 'Subaru Vivio', 'Subaru Vortex', 'Subaru WRX', 'Subaru XT', 'Subaru XV'
        , 'Template:Subaru', 'Template:Subaru (early)', 'Template:Subaru North America'];

        $parent = TaxonomyManager::register('Subaru', 'car-manufacturer');

        foreach ($subarus as $key => $subaru) {
            TaxonomyManager::register($subaru, 'car-subaru', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
