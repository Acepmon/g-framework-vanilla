<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureBMWTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $BMW = ['3/20 PS, compact car (1932–1934)', '303, compact car (1933–1937)', '328, roadster (1936–1940)', '326, mid-size luxury car (1936–1941)', '327, grand tourer (1937–1941)'
        , '320, mid-size luxury car (1937–1938)', '321, mid-size luxury car (1938–1941)', '335, full-size luxury car (1939–1941)', '321, mid-size luxury car (1945–1950)'
        , '326, mid-size luxury car (1945–1946)', '327, grand tourer (1946–1955)', '340, full-size luxury car (1949–1955)', '501, mid-size luxury car (1952–1962)'
        , 'Isetta, microcar (1953–1962)', '503, grand tourer (1956–1959)', '507, roadster (1956–1959)', '700, compact car (1959–1965)', '3200 CS, sports car (1962–1965)'
        , 'New Class (sedans), mid-size luxury car (1962–1972)', 'New Class (coupés), grand tourer (1965–1969)', '02 Series, compact executive car (1966–1977)'
        , 'E9 New Six, grand tourer (1968-1975)', 'E3 New Six, full-size luxury car (1968-1977)', 'E12 5 Series, mid-size luxury car (1972–1981)', 'E21 3 Series, compact executive car (1975–1983)'
        , 'E24 6 Series, grand tourer (1976–1989)', 'E23 7 Series, full-size luxury car (1977–1987)', 'E26 M1, supercar (1978–1981)', 'E28 5 Series, mid-size luxury car (1981–1988)'
        , 'E30 3 Series, compact executive car (1982–1994)', 'E32 7 Series, full-size luxury car (1986–1994)', 'E34 5 Series, mid-size luxury car (1987–1996)', 'Z1, roadster (1989–1991)'
        , 'E31 8 Series, grand tourer (1989–1999)', 'E36 3 Series, compact executive car (1990–2000)', 'E38 7 Series, full-size luxury car (1994–2001)', 'E36/7 Z3, two-seat roadster and coupé (1995–2002)'
        , 'E39 5 Series, mid-size luxury car (1995–2003)', 'E46 3 Series, compact executive car (1998–2006)', 'E53 X5, mid-size luxury SUV (1999–2006)', 'E52 Z8, roadster (2000–2003)'
        , 'E65 7 Series, full-size luxury car (2001–2008)', 'E85 Z4, two-seat roadster and coupé (2002–2008)', 'E60 5 Series, mid-size luxury car (2003–2010)', 'E63 6 Series, grand tourer (2003–2010)'
        , 'E83 X3, compact luxury SUV (2003–2010)', 'E87 1 Series, subcompact car (2004–2013)', 'E90 3 Series, compact executive car (2005–2013)', 'E70 X5, mid-size luxury SUV (2006–2013)'
        , 'E71 X6, mid-size luxury SUV (2008–2014)', 'F01 7 Series, full-size luxury car (2008-2015)', 'E89 Z4, roadster (2009–2016)', 'E84 X1, sub-compact luxury crossover (2009–2015)'
        , 'F06 6 Series, grand tourer (2011–2018)', 'F12/F13 6 Series, grand tourer (2011–2018)', 'F10 5 Series, mid-size luxury car (2010–2017)', 'F25 X3, compact luxury SUV (2011–2017)'
        , 'F20 1 Series, subcompact car (2011–2019)', 'F30 3 Series, compact executive car (2012–2019)', 'I01 i3, fully electric/hybrid subcompact car (2013–present)'
        , 'F32 4 Series, compact executive car (2013–present)', 'F22 2 Series, compact car (2013–present)', 'F15 X5, mid-size luxury SUV (2013–2018)', 'F45 2 Series, Active Tourer (2014–2016)'
        , 'I12 i8, hybrid sports car (2014–present)', 'F26 X4, compact luxury SUV (2014–2018)', 'F16 X6, mid-size luxury SUV (2014–2019)', 'F48 X1, compact SUV (2015–present)'
        , 'G11 7 Series, full-size luxury car (2015–present)', 'G30 5 Series, mid-size luxury car (2016–present)', 'G32 6 Series, mid-size luxury car (2017–present)', 'F39 X2, compact SUV (2018–present)'
        , 'G01 X3, compact luxury SUV (2017-present)', 'G02 X4, compact luxury SUV (2018–present)', 'G05 X5, mid-size luxury SUV (2018–present)', 'G15 8 Series, grand tourer (2018–present)'
        , 'G29 Z4, roadster (2018–present)', 'G20 3 Series, compact executive car (2019–present)', 'F40 1 Series, subcompact car (2019–present)', 'G06 X6, mid-size luxury SUV (2019–present)'
        , 'G07 X7, full-size luxury SUV (2019-present)'];

        foreach($BMW as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'BMW',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '23',
                'count' => 0
            ]);
        }
    }
}
