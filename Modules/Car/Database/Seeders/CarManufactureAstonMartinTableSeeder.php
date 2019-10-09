<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureAstonMartinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $AstonMartin = ['1921–1925 Aston Martin Standard Sports', '1927–1932 Aston Martin First Series', '1929–1932 Aston Martin International', '1932–1932 Aston Martin International Le Mans'
        , '1932–1934 Aston Martin Le Mans', '1933–1934 Aston Martin 12/50 Standard', '1934–1936 Aston Martin Mk II', '1934–1936 Aston Martin Ulster', '1936–1940 Aston Martin 2-litre Speed Models (23 built) The last 8 were fitted with C-type bodywork'
        , '1937–1939 Aston Martin 15/98', '1948–1950 Aston Martin 2-Litre Sports (DB1)', '1950–1953 Aston Martin DB2', '1953–1957 Aston Martin DB2/4', '1957–1959 Aston Martin DB Mark III'
        , '1958–1963 Aston Martin DB4', '1961–1963 Aston Martin DB4 GT Zagato', '1963–1965 Aston Martin DB5', '1965–1966 Aston Martin Short Chassis Volante', '1965–1969 Aston Martin DB6'
        , '1967–1972 Aston Martin DBS', '1969–1989 Aston Martin V8', '1977–1989 Aston Martin V8 Vantage', '1986–1990 Aston Martin V8 Zagato', '1989–1996 Aston Martin Virage/Virage Volante'
        , '1989–2000 Aston Martin Virage', '1993–2000 Aston Martin Vantage', '1996–2000 Aston Martin V8 Coupe/V8 Volante', '1993–2003 Aston Martin DB7/DB7 Vantage', '2001–2007 Aston Martin V12 Vanquish/Vanquish S'
        , '2002–2003 Aston Martin DB7 Zagato', '2002–2004 Aston Martin DB AR1', '2004–2016 Aston Martin DB9', '2005–2018 Aston Martin V8 and V12 Vantage', '2007–2012 Aston Martin DBS V12'
        , '2009–2012 Aston Martin One-77[95]', '2010–present Aston Martin Rapide/Rapide S', '2011–2012 Aston Martin Virage/Virage Volante', '2011–2013 Aston Martin Cygnet, based on the Toyota iQ[96][97]'
        , '2012–2013 Aston Martin V12 Zagato', '2012–2018 Aston Martin Vanquish/Vanquish Volante', '2015–2016 Aston Martin Vulcan', '2016–present Aston Martin DB11', '2018–present Aston Martin Vantage'
        , '2018–present Aston Martin DBS Superleggera', '1944 Aston Martin Atom (concept)', '1961–1964 Lagonda Rapide', '1976–1989 Aston Martin Lagonda', '1980 Aston Martin Bulldog (concept)'
        , '1993 Lagonda Vignale (concept)', '2007 Aston Martin V12 Vantage RS (concept)', '2007–2008 Aston Martin V8 Vantage N400', '2009 Aston Martin Lagonda SUV (concept)[98]'
        , '2010 Aston Martin V12 Vantage Carbon Black Edition[99]', '2010 Aston Martin DBS Carbon Black Edition[99]', '2013 Aston Martin Rapide Bertone Jet 2+2 (concept)'
        , '2013 Aston Martin CC100 Speedster (concept)[100]', '2015 Aston Martin DB10 (concept)', 'Aston Martin DB11', 'Aston Martin DBS Superleggera', 'Aston Martin Rapide S', 'Aston Martin Vantage'];

        foreach($AstonMartin as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'AstonMartin',
            ]);
            DB::table('term_taxonomy')->insert([
                'term_id' => $term_id5,
                'taxonomy' => 'Model',
                'description' => $model,
                'parent_id' => '20',
                'count' => 0
            ]);
        }
    }
}
