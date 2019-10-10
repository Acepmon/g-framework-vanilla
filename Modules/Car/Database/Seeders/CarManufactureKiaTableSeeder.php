<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureKiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kias = ['Cadenza/K7', 'Ceed/Ceed SW/pro_ceed', 'Forte/Cerato/K3', 'K4', 'K9/K900/Quoris', 'Optima/Magentis/K5', 'Pegas', 'Picanto/Morning', 'Ray'
        , 'Rio/Rio5/Pride', 'Soul', 'Stinger', 'Stonic', 'Carens/Rondo', 'Carnival/Sedona', 'Mohave/Borrego', 'Sorento', 'Sportage', 'Pregio', 'Telluride'
        , 'Seltos', 'AM928 – KMC only', 'Granbird – KMC only', 'Bongo, also sold as K2700/Strong/3000S/2500TCI', 'K4000s – KMC only', 'Kia ceed Hybrid'
        , 'Kia Niro Hybrid Utility Vehicle', 'Kia Ray Plug-in hybrid', 'Kia Soul EV', 'Kia Optima Hybrid'];

        $parent = TaxonomyManager::register('Kia', 'car-manufacturer');

        foreach ($kias as $key => $kia) {
            TaxonomyManager::register($kia, 'car-kia', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
