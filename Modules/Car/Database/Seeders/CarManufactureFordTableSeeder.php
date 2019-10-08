<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureFordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Ford = ['Ford C100', 'Ford Capri RS', 'Ford Escort RS 1700T', 'Ford Escort RS Cosworth', 'Ford Fiesta R5', 'Ford Fiesta RS WRC', 'Ford Focus RS WRC', 'Ford G7'
        , 'Ford GT40', 'Ford GT70', 'Ford Mustang GTP (1983–1984)', 'Ford Mustang Maxum GTP (1987)', 'Ford Mustang Probe (GTP, 1985)', 'Ford P68', 'Ford P69', 'Ford RS200'
        , 'Ford Sierra RS Cosworth', 'Ford E-Series (1961–2014)', 'Ford Econoline (1978–2013)', 'Ford Husky (circa 1987, South Africa)', 'Ford Spectron', 'Ford Supervan', 'Ford Thames 300E (1954–1961, Britain)'
        , 'Ford Thames 400E (1957–1965, Britain)', 'Ford Tourneo (1995–present)', 'Ford Tourneo Connect (2002–present, Europe)', 'Ford Transit (1965–present, Europe; 1972–1981, 1994–present, Australia; 2006–present, China; 2014–present, North America)'
        , 'Ford Transit Connect (2002–present, Europe; 2009−present, North America)', 'Ford Transit Courier (2014–present, Europe)', 'Ford Transit Custom (2012–present, Europe)'
        , 'Ford C-MAX (2007–present)', 'Ford S-Max (2008–present, Europe and China)', 'Ford Galaxy (1995–present)', 'Ford Windstar (1995–2004)', 'Ford Aerostar (1986–1997)'
        , 'Ford Freestar (2004–2007)', 'Ford Bronco (1966–1996)', 'Ford Bronco II (1984–1990)', 'Ford Ecosport (2004–present) (Brazilian SUV based on the Ford Fiesta)'
        , 'Ford Edge (2007–present)', 'Ford Endeavour (2002–present, India)', 'Ford Escape (2001–present)', 'Ford Everest (2003–present)', 'Ford Excursion (2000–2005)'
        , 'Ford Expedition (1997–present)', 'Ford Expedition EL/Max (2007–present; extended version of the Expedition)', 'Ford Explorer (1991–present)', 'Ford Fiera (1972–1984, Philippines)[1][2][3]'
        , 'Ford Flex (2009–present)', 'Ford Freestyle (2005–2007)', 'Ford Fusion (Europe) (2002–2012)', 'Ford Kuga (2008–present)', 'Ford Raider (1985–1998) (Australia and New Zealand, a rebadged Mazda Proceed Marvie)'
        , 'Ford Taurus X (2008–2009)', 'Ford Territory (2004–2016)', 'Ford A-Series (Light truck, Europe)', 'Ford B-Series (Bus chassis; 1948–1998)', 'Ford Bronco (Light Truck, 1966–1996)'
        , 'Ford C-Series (Medium-Duty C.O.E. Truck; 1957–1990)', 'Ford CL-Series (1978–1991; Heavy-Duty Cabover truck, replacement for W-Series trucks)', 'Ford Cargo (1981–present; North America, Europe, Brazil)'
        , 'Ford Courier (1952–1960 & 1972–1982, North America; 1991–2002, Europe; 1979–present, Australia; 1998–present, Brazil)', 'Ford D-series (1965–1981; Medium-Heavy truck, replaced by the Cargo, Europe)'
        , 'Ford Explorer Sport Trac (2001–2010)', 'Ford F-Series (1948–present)', 'Ford Freighter', 'Ford H-Series (1961–1965, Heavy-Duty C.O.E. truck commonly referred to as the "Two-Story Falcon")'
        , 'Ford jeep (1941–1945)', 'Ford L-Series (1970–1998; a.k.a. Louisville)', 'Ford LCF (for Low Cab Forward) (2006–present)', 'Ford Lobo (Mexico)', 'Ford Mainline (1952–1958, Australia)'
        , 'Ford Model 01/02 (1940–1942)', 'Ford Model 19 (1941)', 'Ford Model 46 (1933–1934)', 'Ford Model 50 (1935)', 'Ford Model 51 (1935–1936)', 'Ford Model 59 (1945)', 'Ford Model 68 (1936)'
        , 'Ford Model 69 (1946)', 'Ford Model 75 (1937)', 'Ford Model 78 (1937–1942, 1946–1947)', 'Ford Model 79 (1947)', 'Ford Model 81/82 (1938)', 'Ford Model 83 (1945–1947)'
        , 'Ford Model 91/92/922 (1939–1940)', 'Ford Model AA (1927–1931)', 'Ford Model BB (1932–1934)', 'Ford Model TT(1925–1927)', 'Ford Mustero (1966)', 'Ford N-Series (Heavy-duty short conventional cab truck; 1962–1969)'
        , 'Ford P-Series', 'Ford Panel truck', 'Ford R-Series - UK-market bus chassis', 'Ford Ranchero (1957–1979)', 'Ford Ranchero Rio Grande (1969)', 'Ford Ranger (international) (2006–present)'
        , 'Ford Ranger (1983–2012; North America, South America)', 'Ford Ranger EV (1998–2004, all-electric version of the North American Ford Ranger)', 'Ford Ranger (T6) (2011–present; worldwide, 2018–present; North America)'
        , 'Ford SVT Raptor', 'Ford Super Duty (1999–present)', 'Ford Transcontinental (1975–1983, Europe)', 'Ford Transit (1965–present, Europe, Asia, Mexico)', 'Ford Vanette (1946–1965)'
        , 'Ford W-Series (1966–1977; Heavy-Duty C.O.E. truck, replacement for H-Series)'];

        foreach($Ford as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Ford',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '15',
                'count' => 0
            ]);
        }
    }
}
