<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureCadillacTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Cadillac = ['1992-2002 Eldorado —108 in (2,700 mm) wheelbase, V8', '1989-1993 Coupe DeVille -110.8 in (2,810 mm) wheelbase, V8', '1989-1993 Sedan DeVille -113.8 in (2,890 mm) wheelbase, V8'
        , '1992-1997 Seville -111.0 in (2,820 mm) wheelbase, V8', '1994–1999 DeVille —113.8 in (2,890 mm) wheelbase, V8', '1997–2001 Catera —107.5 in (2,730 mm) wheelbase, V6'
        , '1989-1992 Fleetwood -113.8 in (2,890 mm) wheelbase, V8', '1990-1992 Brougham -121.5 in (3,090 mm) wheelbase, V8', '1993-1996 Fleetwood -121.5 in (3,090 mm) wheelbase, V8'
        , '1993 Sixty Special -113.8 in (2,890 mm) wheelbase, V8', '1998-2000 Escalade', '1998-2004 Seville -112.2 in (2,850 mm) wheelbase, V8', '2000-2005 DeVille -115.3 in (2,930 mm) wheelbase, V8'
        , '2002-2006 Escalade', '2003-2006 Escalade ESV', '2003-2013 CTS', '2004-2014 CTS-V Sedan', '2004-2009 SRX', '2004-2009 XLR', '2006-2009 XLR-V', '2005-2010 BLS (not sold in the United States)'
        , '2005-2011 STS -116.4 in (2,960 mm) wheelbase', '2005-2009 STS-V -116.4 in (2,960 mm) wheelbase', '2006-2011 DTS -115.6 in (2,940 mm) wheelbase, V8', '2007-2014 Escalade'
        , '2007-2014 Escalade ESV', '2009-2013 Escalade Hybrid hybrid SUV', '2002-2013 Escalade EXT pickup truck', '2010-2016 SRX', '2010-2013 CTS Sport Wagon', '2011-2014 CTS Coupe'
        , '2011-2014 CTS-V Sport Wagon', '2011-2015 CTS-V Coupe', '2014-2019 CTS Sedan', '2016-2019 CTS-V Sedan', '2013-2018 ATS Sedan', '2016-2018 ATS-V Sedan', '2015-2019 ATS Coupe'
        , '2016-2019 ATS-V Coupe', '2013-2019 XTS', '2014 and 2016 ELR plug-in hybrid coupe', '2015-Present Escalade', '2015-Present Escalade ESV', '2016-Present CT6', '2019-Present CT6-V'
        , '2017-Present XT5', '2019-Present XT4', 'CT4', 'CT4-V', 'CT5', 'CT5-V', 'XT6 (2020)','1980-1985 Seville — 114.3 in (2,900 mm) wheelbase, V8'
        , '1982-1988 Cimarron— 101.2 in (2,570 mm) wheelbase, V6', '1980-1984 Coupe de Ville -121.5 in (3,090 mm) wheelbase, V8', '1980-1984 Sedan de Ville -121.5 in (3,090 mm) wheelbase, V8'
        , '1985–1988 Coupe de Ville —110.8 in (2,810 mm) wheelbase, V8', '1985–1988 Sedan de Ville —110.8 in (2,810 mm) wheelbase, V8', '1985–1988 Fleetwood —110.8 in (2,810 mm) wheelbase, V8'
        , '1985–1988 Fleetwood 75 —134.4 in (3,410 mm) wheelbase, V8', '1987-1988 Fleetwood Sixty Special —115.8 in (2,940 mm) wheelbase, V8', '1979-1985 Eldorado —113.9 in (2,890 mm) wheelbase, V6 or V8'
        , '1986-1991 Eldorado —108 in (2,700 mm) wheelbase, V6 or V8', '1987–1993 Allanté —99.4 in (2,520 mm) wheelbase, V8', '1989–1993 Coupe de Ville —110.8 in (2,810 mm) wheelbase, V8'
        , '1989–1993 Sedan de Ville —113.8 in (2,890 mm) wheelbase, V8', '1989–1993 Fleetwood —113.8 in (2,890 mm) wheelbase, V8', '1980-1986 Fleetwood Brougham -121.5 in (3,090 mm) wheelbase, V8'
        , '1987-1989 Brougham -121.5 in (3,090 mm) wheelbase, V8'];

        foreach($Cadillac as &$model){
            $term_id5 = DB::table('terms')->insertGetId([
                'name' => $model,
                'slug' => 'Cadillac',
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
