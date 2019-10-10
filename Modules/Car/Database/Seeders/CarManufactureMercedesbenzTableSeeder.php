<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureMercedesbenzTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Mercedesbenz = ['400 (1924-1929)', 'W103/Type G1 (1926)', '630 (1926–1929)', 'W02 (1926-1939)', 'W03 (1926-1930)', 'W06, roadster (1927–1932)[1]', '680S (1928)'
        , '460, large luxury car (1928-1939)', '350, grand tourer (1929–1934)', '200 (1929-1934)', 'W07, full-size luxury car (1930–1938)', 'W28, (1931–1932)', 'W19, grand tourer (1932–1933)'
        , 'W22, large luxury car (1933-1934)', 'W21, mid-size luxury car (1933-1936)', 'W18, full-size luxury car (1933-1937)', 'W23, (1934–1936)', '500K, roadster (1934–1936)'
        , 'W31 Type G4, (1934–1939)', 'W30, prototype sport racing car (1935–1936)', 'W136, mid-size car (1935-1942)', 'W138, full-size luxury car (1936–1940)', 'W139/170 VL (1936-1942)'
        , '540K, roadster (1936–1943)', 'W143, mid-size luxury car (1937-1941)', 'W152/Type G5 (1937-1941)', 'W142, large luxury car (1937-1942)', '170 VK (1938-1942)'
        , 'W150, full-size luxury car (1938–1943)', 'W153, mid-size luxury car (1938-1943)', 'W136, mid-size car (1946–1955)', 'W191, mid-size executive car (1949–1955)'
        , 'W187, full-size luxury car (1951–1955)', 'W186, grand tourer (1951–1957)', 'W188, luxury car (1951–1958)', 'W120, mid-size executive car (1953–1962)', 'W180, luxury car (1954–1959)'
        , 'W198 300SL, grand tourer (1954–1963)', 'R121 190SL, roadster (1955–1963)', 'L319, light commercial van (1955–1968)', 'W105, luxury car (1956–1959)', 'W121, mid-size executive car (1956-1961)'
        , 'W189, full-size luxury car (1957–1960)', 'W128, executive car (1958–1960)', 'W111, full-size luxury car (1959–1971)', 'W110, mid-size luxury car (1961–1968)', 'W112, full-size luxury car (1961–1967)'
        , 'W113, roadster (1963–1970)', 'W100, full-size luxury car (1963–1981)', 'W108, full-size luxury car (1965–1973)', 'W114, mid-size executive car (1968-1976)'
        , 'T2, light commercial van (1968–1996)', 'R107, roadster (1971–1989)', 'W116, full-size luxury car (1972–1980)', 'W123, mid-size executive car (1976–1986)', 'W126, full-size luxury car (1979–1992)'
        , 'W460 G-Class, off-road SUV (1979–1990)', 'MB100, light commercial van (1981–1995)', 'W201 190, compact executive car (1982–1993)', 'W124 E-Class, mid-size executive car (1985–1994)'
        , 'R129 SL-Class, grand tourer roadster (1989–2001)', 'W463 G-Class, luxury SUV (1990–2018)', 'W140 S-Class, full-size luxury car (1991–1998)', 'W202 C-Class, compact executive car (1993–2000)'
        , 'W901 Sprinter, light commercial van (1995–2006)', 'W210 E-Class, mid-size executive car (1996–2002)', 'R170 SLK-Class, compact roadster (1996–2003)', 'W638 Vito, light commercial van (1996–2003)'
        , 'W670 Vario, full-size commercial van (1996–2013)', 'C208 CLK-Class, mid-size luxury car (1997–2003)', 'W163 M-Class, mid-size SUV (1997–2004)', 'W168 A-Class, subcompact car (1997–2004)'
        , 'W220 S-Class, full-size luxury car (1998–2005)', 'C215 CL-Class, grand tourer (1998–2006)', 'W203 C-Class, compact executive car (2001–2007)', 'R230 SL-Class, grand tourer (2001–2011)'
        , 'W414 Vaneo, compact MPV (2002–2005)', 'C209 CLK-Class, mid-size luxury car (2002–2010)', 'W211 E-Class, mid-size executive car (2003–2008)', 'C199 SLR McLaren, grand tourer (2003–2010)'
        , 'W639 Vito, light commercial van (2003–2014)', 'W219 CLS-Class, mid-size luxury car (2004–2010)', 'R171 SLK-Class, compact roadster (2004–2010)', 'W169 A-Class, subcompact car (2005–2011)'
        , 'W221 S-Class, Full-Size Luxury Car (2006-2013)', 'W251 R-Class, luxury MPV (2005–2017)', 'W164 M-Class, mid-size luxury SUV (2005–2011)', 'W245 B-Class, subcompact MPV (2006–2011)'
        , 'X164 GL-Class, full-size luxury SUV (2006–2012)', 'NCV3 Sprinter, light commercial van (2006–2018)', 'C216 CL-Class, grand tourer (2006–2014)', 'W204 C-Class, compact executive car (2008–2013)'
        , 'X204 GLK-Class, compact luxury crossover (2008–2015)', 'W212 E-Class, mid-size executive car (2009–2016)', 'C197 SLS AMG, sports car (2010–2014)', 'W218 CLS-Class, mid-size luxury car (2011–2018)'
        , 'R172 SLK-Class, compact roadster (2011–present)', 'W246 B-Class, subcompact MPV (2012–2018)', 'X166 GL-Class, full-size luxury SUV (2012–present)', 'W415 Citan, MPV van (2012–present)'
        , 'W176 A-Class, subcompact car (2013–2018)', 'R231 SL-Class, grand tourer roadster (2013–present)', 'W222 S-Class, full-size luxury car (2013–present)', 'C117 CLA-Class, subcompact executive car (2013–2019)'
        , 'X156 GLA-Class, subcompact luxury crossover (2013–present)', 'W205 C-Class, compact executive car (2014–present)', 'W447 Vito, light commercial van (2014–present)', 'C190 AMG GT, sports car (2015–present)'
        , 'X253 GLC-Class, compact luxury SUV (2015–present)', 'W213 E-Class, mid-size executive car (2016–present)', 'BR470 X-Class, luxury pickup truck (2017–present)'
        , 'W177 A-Class, subcompact car (2018–present)', 'C257 CLS-Class, mid-size luxury car (2018–present)', '️Mercedes-AMG GT 4-Door Coupé, Executive Car, 5 door liftback (2019-present)'
        , 'W463 G-Class, mid-size luxury SUV (2018–present)', 'EQC, fully electric compact SUV (2019–present)', 'W167 GLE-Class, mid-size SUV (2019–present)'
        , 'W247 B-Class, subcompact MPV (2019–present)', 'C118 CLA-Class, subcompact executive car (2019–present)', 'X247 GLB-Class, compact luxury SUV (2019–present)'
        , 'Mercedes-amg project one hybrid sports car (2019-present)'];

        foreach($Mercedesbenz as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Mercedesbenz',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '19',
                'count' => 0
            ]);
        }
    }
}
