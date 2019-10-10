<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureChevroletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chevrolets = ['150 (1953-1957)', '210 (1953-1957)', '400 (1962-1974)', '454 SS (1990-1993)', '500 (1983-1995)', '1700 (1972-1978)', '2500 (1973-1978)', '3800 (1972-1978)', '4100 (1972-1978)'
        , 'A-10 (1981-1985)', 'A-20 (1985-1996)', 'Advance Design (1947-1955)', 'AK Series (1941-1942)', 'Agile (2009–2015)', 'Ajax (1994-2009)', 'Alero (1999–2004)', 'Apache (1955-1960)'
        , 'Astro (1985–2005)', 'Avalanche (2002–2013)', 'Baby Grand/H-4 (1914-1922)', 'Beauville station wagon (1955-1957)', 'Beauville (van) (1971–1996)', 'B-Series (1966-2003)'
        , 'Bel Air (1950–1975 for US and 1950-1981 for Canada)', 'Beretta (1987–1996)', 'Biscayne (1958–1972 for US and 1958-1975 for Canada)', 'Bison (1977–1980)', 'BJN (1961-1986 for US and 1962-1999 for Canada)'
        , 'Blazer (1995-2005 in most markets and 1997-2012 for Brazil)', 'Brookwood (1958–1961, 1969–1972)', 'Bruin (1978–1988)', 'C-10 (1964-1985)', 'C-20 (1985-1996)', 'Calibra (1989-1997)'
        , 'Camaro (1967–2002)', 'Camby (1989-2013)', 'Cameo (1955-1959)', 'Caprice (2000–2017 for the Middle East, 1965–1996 and 2011–2017 for North America)', 'Cassia (1998-2002)'
        , 'Cavalier (1982–2005)', 'Cebra (1984-1994 for Brazil and 1985-2015 for Mexico)', 'Celebrity (1982–1990)', 'Celta (2000–2015)', 'Celtic (1991-2009 for Canada)', 'Chevair (1976-1985)'
        , 'Chevelle (1964–1977)', 'Chevelle Laguna (1973–1976)', 'Chevette (1976–1987 for US, Venezuela, and Argentina, 1973-1993 for Brazil, 1976-1996 for Ecuador, and 1976-1998 for Colombia)'
        , 'Chevy (1969-1978)', 'Chevy (1994-2012)', 'Chevy II (1962-1968)', 'Chevy Malibu (1968–1982)', 'Citation (1980–1985)'
        , 'C/K (1960-2000 for US, 1965-2000 for Canada, 1964-2001 for Brazil, 1975-1982 for Chile, and 1960-1978/1986-1994 for Argentina)', 'CMP (1991–2013)', 'CMV (1991–2013)'
        , 'Cobalt (2005–2010)', 'Cobalt SS (2005–2010)', 'Commodore (1978-1982)', 'Confederate Series BA (1932)', 'Constantia (1969-1978)', 'Corsa (1994-2011)', 'Corsa Classic (2000-2010)'
        , 'Corsa Plus (2005-2010)', 'Corsica (1987–1996)', 'Corvair (1960–1969)', 'Corvan (1960–1969)', 'Cruze (2001-2008)', 'D-10 (1980-1985)', 'D-20 (1985–1996)', 'Delray (1958)'
        , 'Deluxe (1941-1942, 1945-1952)', 'D-Max (2002-2008)', 'Eagle (1933)', 'El Camino (1959–1960, 1964–1987)', 'Epica (2004-2006)', 'Epica (2006–2011)', 'Evanda (2005-2006)'
        , 'FA Series (1918)', 'FB Series (1919-1922)', 'Fleetline (1941-1942, 1945-1952)', 'Fleetmaster (1946–1948)', 'Forester (2002-2005)', 'Frontera (1989-2004)', 'G506 (1941-1945)'
        , 'Gemini (1985-1990)', 'Greenbrier (1961–1972)', 'Greenbrier (1961-1965, 1969-1972)', 'G-series (1964-1996)', 'HHR (2006–2011)', 'Independence Series AE (1931)'
        , 'International Series AC (1929)', 'Joy (2005-2009)', 'K5 Blazer (1969-1994 for North America and 1995-2001 for Brazil and Argentina)', 'Kadett (1979-1991)', 'Kalos (2005-2008)'
        , 'Kingswood (1959–1960, 1969–1972)', 'Kingswood Estate (1969–1972)', 'Kodiak (1980–2009)', 'Kommando (1968-1980)', 'Lakewood (1961-1962)', 'Lee (1963-1980)', 'Light Six (1914-1915)'
        , 'Lova (2006–2010)', 'Lumina (1990–2001 for North America and 1998–2017 for the Middle East and South Africa)', 'Lumina APV (1990-1996)'
        , 'LUV (1972-1982 for North America and 1981-2005 for South America)', 'Marajó (1980-1989)', 'Master (1933-1942)', 'Mayano (1987-2017)', 'Meriva (2002-2010 for Latin America and 2002-2011 for Brazil)'
        , 'Matiz (2005-2010)', 'Mercury (1933)', 'Metro (1998–2001)', 'Monte Carlo (1970–1988, 1995–2007)', 'Monza (1975–1980)', 'National Series AB (1928)', 'Nomad (station wagon) (1955–1961, 1968–1972)'
        , 'Nomad (SUV) (1973-1982)', 'Nova (1969–1979, 1985-1988)', 'Nubira (2004)', 'Opala (1969-1992)', 'Optra Wagon (Japan)', 'Omega (1992-2008, 2010–present)'
        , 'Optra (2004-2013 for Colombia, 2004–2008 for Canada, 2006–2009 for Mexico, 2002-2008 for India, and 2002-2010 for Vietnam)', 'Orlando (2010–2014 for Canada and Europe)'
        , 'Parkwood (1959–1961)', 'Prizm (1998–2002)', 'Rezzo (2002-2008)', 'Rodeo (1989-2004)', 'S-10 Blazer (1983-1994)', 'S-10 EV (1997–1998)', 'Senator (1978-1982)'
        , 'Series 490 (1915-1922)', 'Series AA Capitol (1927)', 'Series C Classic Six (1911-1913)', 'Series D (1917-1918)', 'Series F (1917)', 'Series H (1914-1916)', 'Series M Copper-Cooled (1923)'
        , 'Special (1949-1957)', 'Spectrum (1985–1988)', 'Sprint (1985–1988 for North America and 1987-2004 for Colombia)', 'SSR (2003–2006)', 'Chevrolet SS (2013-2017)'
        , 'Stamp (1981-2009 for Canada)', 'Standard (1933-1936)', 'Styleline (1941-1942)', 'Stylemaster (1945-1948)', 'Superior Series B (1923)', 'Superior Series F (1924)', 'Superior Series K (1925)'
        , 'Superior Series V (1926)', 'Swift (1991-2004)', 'Tacuma (2002-2008)', 'Task Force Series (1955-1959)', 'Tigra (1994-2000)', 'Titan (1969–1980)', 'Tosca (2006-2011)', 'Townsman (1953–1957, 1969–1972)'
        , 'Trafic (1997-2000)', 'Trans Sport (1997-2005)', 'Universal Series AD (1930)', 'Uplander (2005–2008 for US, Chile, and Middle East, and 2005-2009 for Canada and Mexico)'
        , 'Van (1964-1996)', 'Vectra (1993-2008)', 'Vega (1971–1977)', 'Veraneio (1964-1993)', 'Vitara (1988-1998)', 'Viva (2004-2008)', 'Vivant (2002-2008)', 'Venture (1997–2005)'
        , 'Viking', 'Yeoman (1958)', 'Zafira (2001-2011 South America)', 'Chevrolet Aero 2003A (1987)', 'Aerovette (1976)', 'Astro I (1967)', 'Astro II (1968)', 'Astro III (1969)'
        , 'Astrovette (1968)', 'Aveo RS (2010)', 'Beat (concept) (2007)', 'Bel Air Concept (2002)', 'Biscayne (concept) (1955)', 'Blazer XT-1 (1987)', 'Bob (2007)', 'Bolt (2015)'
        , 'Borrego (2001)', 'California IROC Camaro (1989)', 'Camaro Black Concept (2008)', 'Camaro Chroma Concept (2009)', 'Camaro Concept (2006)', 'Camaro Convertible Concept (2007)'
        , 'Camaro Convertible Concept (2010)', 'Camaro Dale Earnhardt Jr. Concept (2008)', 'Camaro Dusk Concept (2009)', 'Camaro GS Racecar Concept (2008)', 'Camaro LS7 Concept (2008)'
        , 'Camaro LT5 Concept (1988)', 'Camaro SS (concept) (2003)', 'Camaro SSX (2010)', 'Camaro ZL1 (concept) (2011)', 'Caprice PPV (Concept) (2010)', 'Cheyenne (concept) (2003)'
        , 'Citation IV (1984)', 'Cobalt (concept) (2011)', 'Code 130R (2012)', 'Colorado Concept (2011)', 'CERV (1960, 1964, 1990, 1992)', 'Corvair (concept) (1954)', 'Corvair (concept) (1960)'
        , 'Corvair Coupe Speciale (1960, 1962, 1963)', 'Corvair Monza GT (1962)', 'Corvair Monza SS (1962)', 'Corvair Sebring Spyder (1961)', 'Corvair Super Spyder (1962)', 'Chevrolet Testudo (1963)'
        , 'Corvette (concept) (1953)', 'Corvette C2 (concept) (1962)', 'Corvette Indy (1986)', 'Corvette Nivola (1990)', 'Corvette Stingray (concept) (1959)', 'Corvette Stingray (concept) (2009)'
        , 'Corvette XP-700 (1958)', 'Corvette XP-819 Rear Engine (1964)', 'Corvette Z03 (2008)', 'Corvette Z06X (2010)', 'Corvette ZR1 (concept) (2008)', 'Corvette ZR2 (1989)'
        , 'Cruze (concept) (2010)', 'Cruze Eco (concept) (2011)', 'Cruze RS (concept) (2011)', 'GPiX Concept (2008)', 'Equinox Xtreme Concept (2003)', 'E-Spark (2010)', 'Express (1987)'
        , 'FNR (2015)', 'Groove (2007)', 'Highlander (1993)', 'HHR (concept) (2005)', 'Impala (concept) (1956)', 'Jay Leno Camaro (2009)', 'M3X (2004)', 'Mako Shark (1961)', 'Mako Shark II (1965)'
        , 'Malibu (concept) (2011)', 'Malibu Maxx (concept) (2003)', 'Chevrolet Miray (2012)', 'Manta Ray (1969)', 'Mulsanne (1974)', 'Nomad (concept) (1954, 1999, 2004)', 'Orlando (concept) (2008)'
        , 'Colorado Rally Concept (2011)', 'Q-Corvette (1957)', 'Ramarro (1984)', 'Rondine (1963)', 'S3X (2004)', 'Scirocco (1970)', 'Sequel (2005)', 'Silverado 427 Concept (2007)'
        , 'Silverado Orange County Choppers Hauler Concept (2007)', 'Silverado ZR2 Concept (2010)', 'Sonic (concept) (2010)', 'Sonic Z-Spec Concept (2011)', 'SR-2 (1957)', 'SS (2003)'
        , 'Suburban 75th Anniversary Diamond Edition (2010)', 'Super Carry (van)[citation needed]', 'Synergy Camaro concept (2009)', 'T2X (2005)', 'Tandem 2000 (1999)', 'Trailblazer SS Concept (2002)'
        , 'Trax (2007)', 'Triax (2000)', 'Tru 140S (2012), images used for the Chevy Jolt prank[17][18][19]', 'Venture (1988)', 'Volt (concept) (2007)', 'Volt MPV5 Electric Concept (2010)'
        , 'Wedge Corvette (1963)', 'WTCC ULTRA Concept (2006)', 'XP-882 Four Rotor (1973)', 'XP-895 Reynolds (1973)', 'XP-897GT Two-Rotor (1973)', 'XP-898 (1973)', 'XT-2 (1989)', 'YGM1 (1999)'];

        $parent = TaxonomyManager::register('Chevrolet', 'car-manufacturer');

        foreach ($chevrolets as $key => $chevrolet) {
            TaxonomyManager::register($chevrolet, 'car-chevrolet', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
