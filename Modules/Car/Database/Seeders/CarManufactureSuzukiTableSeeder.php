<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureSuzukiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suzukis = ['Suzuki Aerio', 'Suzuki Alto', 'Suzuki APV', 'Suzuki Baleno', 'Suzuki Baleno (2015)', 'Suzuki Cappuccino', 'Suzuki Cara', 'Suzuki Carry', 'Suzuki Celerio', 'Suzuki Cervo', 'Suzuki Cultus'
        , 'Suzuki Cultus Crescent', 'Suzuki CV1', 'Suzuki Equator', 'Suzuki Ertiga', 'Suzuki Escudo', 'Suzuki Esteem', 'Suzuki Farm Worker', 'Suzuki Forenza', 'Suzuki Fronte', 'Suzuki Fronte 800'
        , 'Suzuki Fun', 'Suzuki Grand Vitara', 'Suzuki GSX-R/4', 'Suzuki Hatch', 'Suzuki Hustler', 'Suzuki Ignis', 'Suzuki Jimny', 'Suzuki Kei', 'Suzuki Kizashi', 'Suzuki Landy', 'Suzuki Lapin'
        , 'Suzuki Liana', 'Suzuki LJ80', 'Suzuki Mehran', 'Suzuki Mighty Boy', 'Suzuki MR Wagon', 'Suzuki Nomade', 'Suzuki Palette', 'Suzuki Reno', 'Suzuki Samurai', 'Suzuki Santana'
        , 'Suzuki SC100', 'Suzuki Sidekick', 'Suzuki Sierra', 'Suzuki Solio', 'Suzuki Spacia', 'Suzuki Splash', 'Suzuki Suzulight', 'Suzuki Swift', 'Suzuki Swift+', 'Suzuki SX4', 'Suzuki SX4 S-Cross'
        , 'Suzuki Twin', 'Suzuki Vitara', 'Suzuki Wagon R', 'Suzuki X-90', 'Suzuki X-HEAD', 'Suzuki XL-7', 'Template:Suzuki timeline (Europe) 1980 to date'
        , 'Template:Suzuki timeline (North America) 1985 to date', 'Template:Suzuki timeline 1955–1989', 'Template:Suzuki timeline 1980 to date', 'Template:Suzuki vehicles'];

        $parent = TaxonomyManager::register('Suzuki', 'car-manufacturer');

        foreach ($suzukis as $key => $suzuki) {
            TaxonomyManager::register($suzuki, 'car-suzuki', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
