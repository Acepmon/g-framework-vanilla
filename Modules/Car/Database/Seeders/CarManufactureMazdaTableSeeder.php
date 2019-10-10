<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureMazdaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mazdas = ['1931–1960 Mazdago three-wheel truck', '1958–1964 Romper truck', '1959–1965 D1100/D1500 truck', '1959–1969 K360 three-wheel truck', '1959–1971 T600 three-wheel truck'
        , '1960–1966 R360 kei car sedan', '1961–1962 P360/P600 "Carol" kei car sedan', '1961–1964 B1500/Proceed pickup truck', '1961–1966 B360/B600 kei car pickup truck'
        , '1962–1965 D2000 truck', '1964–1966 Familia/800/1000 compact car', '1964–2010 E2000 truck', '1965–1977 Kraft truck', '1965–1972 Light Bus Type A minibus'
        , '1966–1972 Light Bus Type C minibus', '1965–1971 B1500/Proceed pickup truck', '1966–1973 Luce/1500/1800/R130 luxury car', '1966–1977 Bongo small minivan'
        , '1967–1972 Familia/1000/1200/1300/R100 compact car', '1967–1972 Cosmo Sport 110S sports car', '1968–1976 E360/Porter small pickup truck', '1968–1980 Boxer truck'
        , '1968–1989 Porter CAB small pickup truck', '1970–1976 Capella/616/RX-2 mid-size car', '1971–1978 Savanna/RX-3 coupé', '1971–2014 Titan truck'
        , '1971–1978 Grand Familia/808/818/Mizer compact car', '1972–1977 Chantez kei car', '1972–1997 Parkway 26 minibus', '1972–1977 Familia Presto/1000/1300'
        , '1972–1977 Luce/RX-4 luxury car', '1974–1977 Rotary Pickup (REPU) pickup truck', '1974–1981 T3000 minibus', '1975–1978 Roadpacer full-size car'
        , '1975–1980 Cosmo/RX-5 luxury car', '1976–1984 121 compact car', '1977–1981 Luce Legato luxury car', '1977–1982 Capella/626/Montrose mid-size car'
        , '1977–1983 Familia/323/GLC compact car', '1978–1982 Bongo small minivan', '1978–1984 Savanna/RX-7 sports car', '1980–1984 Familia/323 compact car'
        , '1981–1986 929/Luce luxury car', '1982–1986 Mazda T3000 minibus', '1983–1987 Capella/626 mid-size car', '1983–1988 Bongo small minivan', '1985–1988 Familia/323 compact car'
        , '1985–1992 Savanna/RX-7 sports car', '1985–1995 121/Demio compact car', '1986–1991 929/Luce luxury car', '1986–1992 Mazda T3500 minibus', '1987–1990 Etude compact car'
        , '1988–1992 Capella/626 mid-size car', '1988–1992 Persona mid-size car', '1988–1992 MX-6 coupé', '1988–1998 MPV minivan', '1989–1990 Carol kei car', '1989–1994 Familia/323/Protegé compact car'
        , '1989–1994 Bongo small minivan', '1989–1998 MX-5/Miata convertible sports car', '1989–1995 Mazda Custom Cab', '1990–1994 Carol kei car', '1990–1998 929/Sentia luxury car'
        , '1991–1994 Mazda Navajo SUV', '1990–1998 AZ-3/MX-3 coupé', '1993–1997 MX-6 coupé', '1993–1997 Cronos/626 mid-size car', '1993–1997 Lantis/Astina compact car', '1993–2002 Millenia/Xedos9/Eunos 800 luxury car'
        , '1993–2002 RX-7 sports car', '1994–1999 Familia/Protegé/Etude/323 compact car', '1994–1998 AZ-Wagon station wagon', '1995–1998 Bongo small minivan', '1995–1998 Carol kei car'
        , '1996–2005 121/Demio/Mazda2 compact car', '1998–2003 AZ-Wagon station wagon', '1998–2002 Capella/626 mid-size car', '1998–2014 AZ-Offroad SUV', '1998–2005 MX-5/Miata convertible sports car'
        , '1999–2000 Carol kei car', '1999–2000 Laputa kei car', '1999–2001 Bongo small minivan', '1999–2005 Premacy small minivan', '1999–2006 MPV minivan', '2000–2003 Familia/Protegé/323 compact car'
        , '2001–2005 Carol kei car', '2001–2011 Mazda Tribute SUV', '2001–2006 Laputa kei car', '2002–2008 Spiano kei car', '2003–2009 RX-8 sports car', '2003–2008 AZ-Wagon station wagon'
        , '2004–2009 Carol kei car', '2004–2015 Mazda Verisa Subcompact car', '2005–2015 MX-5 convertible sports car', '2006–2016 MPV minivan', '2007–2012 CX-7 crossover SUV'
        , '2007–2016 CX-9 crossover SUV', '2008–2012 AZ-Wagon station wagon', '2009–2014 Carol kei car', '2009–2012 RX-8 sports car', '2010–2015 Premacy/Mazda5 minivan'
        , '2008–2016 Biante — minivan', '2006–2016 Mazda8/MPV — minivan', '1999–2017 Bongo – Commercial van', 'Mazda Activehicle (1999)', 'Mazda AZ550 (1989)', 'Mazda BU-X (1995)'
        , 'Mazda Chantez EV (1972)', 'Mazda CU-X (1995)', 'Mazda CVS (1974)', 'Mazda Deep Orange 3 (2013)', 'Mazda Furai (2008)', 'Mazda Gissya (1991)', 'Mazda Hakaze Concept (2007)'
        , 'Mazda Hazumi (2014)', 'Mazda HR-X (1991)', 'Mazda HR-X 2 (1993)', 'Mazda Ibuki (2003)', 'Mazda Kaan', 'Mazda Kabura (2006)', 'Mazda Kai (2017)', 'Mazda Kazamai (2008)'
        , 'Mazda Kiyora (2008)', 'Mazda Koeru (2015)', 'Mazda Le Mans Prototype (1983)', 'Mazda London Taxi (1993)', 'Mazda Miata Mono-Posto (1999)', 'Mazda Minagi (2011)'
        , 'Mazda MS-X (1997)', 'Mazda MV-X (1997)', 'Mazda MX-02 (1983)', 'Mazda MX-03 (1985)', 'Mazda MX-04 (1987)', 'Mazda MX-5 Superlight (2009)', 'Mazda MX-81 (1981)'
        , 'Mazda MX-Crossport (2005)', 'Mazda MX-Flexa (2004)', 'Mazda MX-Micro Sport (2004)', 'Mazda MX Sport Tourer (2001)', 'Mazda MX Sportif (2003)', 'Mazda Nagare (2006)'
        , 'Mazda Neospace (1999)', 'Mazda Nextourer (1999)', 'Mazda RX-01 (1995)', 'Mazda RX 87 (1967)', 'Mazda RX-500 (1970)', 'Mazda RX-510 (1971)', 'Mazda RX-Evolv (1999)'
        , 'Mazda RX-Vision (2015)', 'Mazda Ryuga (2007)', 'Mazda Sassou (2005)', 'Mazda Secret Hideout (2001)', 'Mazda Senku (2005)', 'Mazda Shinari (2010)', 'Mazda SU-V (1995)'
        , 'Mazda SW-X (1999)', 'Mazda Taiki (2007)', 'Mazda Takeri (2011)', 'Mazda TD-R (1989)', 'Mazda Vision Coupe (2017)', 'Mazda Washu (2003)'];

        $parent = TaxonomyManager::register('Mazda', 'car-manufacturer');

        foreach ($mazdas as $key => $mazda) {
            TaxonomyManager::register($mazda, 'car-mazda', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
