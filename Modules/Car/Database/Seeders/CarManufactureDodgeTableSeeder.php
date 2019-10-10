<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureDodgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dodges = ['Dodge 330 (1963–1964)', 'Dodge 400 (1982–1983)', 'Dodge 440 (1963–1964)', 'Dodge 600 (1983–1988)', 'Dodge 880 and Custom 880 (1962–1965) [1]', 'Dodge Aries (1981–1989)', 'Dodge Aspen (1976–1980)'
        , 'Dodge Avenger (1995–2000, 2008–2014)', 'Dodge Caliber (2007–2012)', 'Dodge Challenger (1970–1974, 1978-1983, 2008-Present)', 'Dodge Charger (1966-1977, 1982-1987, 2006-Present)'
        , 'Dodge Colt (1971–1994 as rebadged Mitsubishi Chariot, Galant, Mirage and Lancer models)', 'Dodge Conquest (1984–1986 as rebadged Mitsubishi Starion)'
        , 'Dodge Coronet (1949–1959, 1965–1976, see also 1955–1957 Dodge and Dodge Super Bee)', 'Dodge Custom (1946-1948)', 'Dodge Custom Royal (1955-1959)', 'Dodge Dart (1960-1976)'
        , 'Dodge Dart (2013–2016)', 'Dodge Daytona (1984–1993)', 'Dodge Deluxe (1946-1948)', 'Dodge Demon (1971-1972)', 'Dodge Diplomat (1977–1989)', 'Dodge Dynasty (1988–1993)', 'Dodge Eight (1930–1933)'
        , 'Dodge Fast Four (1927–1928)', 'Dodge Intrepid (1993–2004)', 'Dodge Lancer (1961–1962, 1985–1989)', 'Dodge Magnum (1978–1979, 2005–2008)', 'Dodge Matador (1960)', 'Dodge Meadowbrook (1949–1954)'
        , 'Dodge Mirada (1980–1983)', 'Dodge Model 30 (1914–1922)', 'Dodge Monaco and Royal Monaco (1965–1978, 1990–1992)', 'Dodge Neon (1994–2005, see also Dodge SRT-4)', 'Dodge Omni (1978–1990, see also Dodge 024)'
        , 'Dodge Polara (1960–1973)', 'Dodge Raider (1987–1989)', 'Dodge Royal (1954–1959, see also 1955–1957 Dodge)', 'Dodge Senior (1927–1930)', 'Dodge Series 116 (1923–1925)'
        , 'Dodge Series 126 (1926–1927)', 'Dodge Shadow (1987–1994)', 'Dodge Sierra and Suburban (1957–1959, see also 1955–1957 Dodge)', 'Dodge Six (1929–1949)', 'Dodge Spirit (1989–1995)'
        , 'Dodge Standard (1928–1929)', 'Dodge Stealth (1991–1996 as rebadged Mitsubishi GTO)', 'Dodge Stratus (1995–2006)', 'Dodge St. Regis (1979–1981)', 'Dodge Victory (1928–1929)'
        , 'Dodge Viper (1992–2017)', 'Dodge Wayfarer (1949–1952)', 'Dodge Arrow (Canada)', 'Dodge Crusader (Canada 1951–1958)', 'Dodge Kingsway (Canada 1946–1952)', 'Dodge Mayfair (Canada 1953–1959)'
        , 'Dodge Regent (Canada 1946–1959)', 'Dodge Viscount (Canada 1959)', 'Dodge Kingsway Deluxe (Mexico 1958)'];

        $parent = TaxonomyManager::register('Dodge', 'car-manufacturer');

        foreach ($dodges as $key => $dodge) {
            TaxonomyManager::register($dodge, 'car-dodge', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
