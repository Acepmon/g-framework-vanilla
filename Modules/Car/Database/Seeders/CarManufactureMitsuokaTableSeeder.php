<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureMitsuokaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Mitsuoka = ['1996–present Galue', '2008–present Himiko', '2014–present Ryugi (based on the Toyota Corolla Axio and Toyota Corolla Fielder)', '1993–present Viewt', '2010–present Like-T3'
        , '2018–present Rock Star (Chevrolet Corvette C2 inspiration based on the Mazda MX-5)', '1982 BUBU 50 Series (a series of three-wheeled microcars)[3]'
        , '1989-1990 BUBU 356 Speedstar[4] (a copy of the Porsche 356 Speedster)', '1987 BUBU Classic SSK (copy of the Mercedes-Benz SSK roadster based on the Volkswagen Beetle)'
        , '2008-2012 Galue 204 (based on the Toyota Corolla Axio)', '2010-2012 Galue Classic', '1991 Dore (similar to the Le-Seyde, based on the Ford Mustang)'
        , '1990, 2000 Le-Seyde (a Nissan Silvia-based coupé in the spirit of the Zimmer)', '2010-2012 Like (based on the Mitsubishi i-MiEV)', '1998-2007 Mitsuoka Microcar'
        , '1998-2007 Microcar K-1/MC-1', '1999-2007 MC-1T', '1998-? Microcar K-2 (based on the design of the FMR Tg500)', '2005-? Microcar K-3/Type F (design similar to the Zero1)'
        , '2006-? Microcar K-4/Type R[5] (styling reminiscent of 1950s race cars)', '1999-2007 ME-1', '2002-2007 ME-2 (Convoy 88)', '2004-2012 Nouera (based on the Honda Accord and later the Toyota Corolla)'
        , '2007-2014 Orochi (based on the Honda NSX)', '1996-2004 Ray (styling similar to the Riley Elf Mk.3, based on the Mazda Carol and later the Daihatsu Mira Gino)'
        , '1998-2004 Ryoga a "classically" styled sedan originally based on the Primera and later on the smaller Sunny', '1996-2000 Type F (a restyled Zero1)'
        , '2000-2001 Yuga (a London Taxi copy based on the Nissan Cube)', '1994-2000 Zero1[6] (a Lotus Super Seven copy with Eunos Roadster drivetrain)'];

        foreach($Mitsuoka as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Mitsuoka',
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
