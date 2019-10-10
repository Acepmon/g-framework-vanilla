<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureLexusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lexuses = ['2011 Lexus CT 200h', '2014 Lexus CT 200h', '2000 Lexus IS 200/IS 300', '2006 Lexus IS 250/IS 250 AWD/IS 300/IS 350/IS 220d', '2008 Lexus IS F', 
        '2010 Lexus IS 250 C/IS 300 C/IS 350 C/IS F', '2011 Lexus IS 220d', '2013 Lexus IS 250/IS 350/IS 300h', '2015 Lexus IS 200t'
        , '2017 Lexus IS 250/IS 300/IS 350/IS 300h', '2010 Lexus HS 250h', '2013 Lexus HS 250h', '1990 Lexus ES 250', '1992 Lexus ES 300', '1997 Lexus ES 300',
         '2004 Lexus ES 330', '2007 Lexus ES 350', '2010 Lexus ES 240', '2013 Lexus ES 250/ES 300h/ES 350', '2015 Lexus ES 200/ES 250/ES 300h/ES 350'
        , '1993 Lexus GS 300', '1998 Lexus GS 300/GS 400', '2001 Lexus GS 430', '2006 Lexus GS 300/GS 300 AWD/GS 430/GS 450h', '2008 Lexus GS 350/GS 350 AWD/GS 460', 
        '2013 Lexus GS 250/GS 350/GS 350 AWD/GS 450h', '2015 Lexus GS 200t/GS 250/GS 350/GS 350 AWD/GS 450h/GS F', '1990 Lexus LS 400', '2001 Lexus LS 430', '2007 Lexus LS 460/LS 460 L'
        , '2008 Lexus LS 600h/LS 600h L', '2009 Lexus LS 460/LS 460 AWD/LS 460 L/LS 460 L AWD', '2010 Lexus LS 460 SZ/Sport', '2013 Lexus LS 460/LS 460 AWD/LS 460 L/LS 460 L AWD/LS 600h L',
         '2017 Lexus LS 500/LS 500h', '1992 Lexus SC 300/SC 400', '2002 Lexus SC 430', '2006 Lexus SC 430', '2014 Lexus RC 300h/RC 350/RC F', '2016 Lexus RC 200t', '2016 Lexus LC 500/LC 500h'
         , '2011 Lexus LFA', '2012 Lexus LFA Nürburgring Package', '2014 Lexus NX 200t/NX 300h', '2018 Lexus UX 200/UX 250h', '1999 Lexus RX 300', '2004 Lexus RX 330'
         , '2006 Lexus RX 400h', '2007 Lexus RX 350', '2010 Lexus RX 350/RX 450h', '2011 Lexus RX 270', '2013 Lexus RX 270/RX 350/RX 450h', '2015 Lexus RX 200t/RX 350/RX 450h', 
         '2003 Lexus GX 470', '2011 Lexus GX 460', '2014 Lexus GX 460', '1997 Lexus LX 450', '1999 Lexus LX 470', '2008 Lexus LX 470/LX 570'
         , '2013 Lexus LX 460/LX 570', '2016 Lexus LX 570', '2020 Lexus LM 350', '2020 Lexus LM 300h', '2011 Lexus CT 200h F Sport'
         , '2014 Lexus CT 200h F Sport', '2011 Lexus IS 250/350/200d/250 C/350 C F Sport', '2013 Lexus IS 250/300h/350 F Sport', '2013 Lexus GS 350 F Sport', '2013 Lexus GS 450h F Sport'
         , '2013 Lexus LS 460 F Sport', '2013 Lexus LS 600h F Sport', '2013 Lexus RX 350 F Sport', '2013 Lexus RX 450h F Sport', '2014 Lexus NX 200t F Sport'
         , '2014 Lexus RC 350 F Sport', '2003 SportDesign IS 300', '2007 Limited Edition IS 250 X', '2007 Neiman Marcus Edition IS F', '2007 "Elegant White" IS 250/350'
         , '2009 Special Edition IS 250 SR', '2009 "Red-edge Black" IS 250/350', '2009 "Blazing Terracotta" IS F', '2010 "X-Edition" IS 250', '2010 IS 350 C F Sport Special Edition'
         , '2011 Stone Works "Sunrise" IS 250', '1996 Coach Edition ES 300', '1999 Coach Edition ES 300', '2000 Platinum Edition ES 300', '2004 SportDesign ES 330'
         , '2005 Black Diamond Edition ES 330', '2009 Pebble Beach Edition ES 350', '2000 Platinum Series GS 300/400', '2001 SportDesign GS 300', '2007 Neiman Marcus Edition GS 450h'
         , '2009 "Passionate Black" GS 350/460/450h', '2009 "Meteor Black" GS 350/460', '2011 Stone Works "Sunset" GS 350', '1997 Coach Edition LS 400', '2000 Platinum Series LS 400'
         , '2007 Neiman Marcus Launch Edition LS 600h L', '2009 Pebble Beach Edition LS 600h L', '2004 Pebble Beach Edition SC 430', '2005 Pebble Beach Edition SC 430'
         , '2006 Pebble Beach Edition SC 430', '2007, 2008, 2009 Pebble Beach SC 430', '2010 "Eternal Jewel" SC 430', '2012 LFA Special Edition', '2001 SilverSport Special Edition RX 300'
         , '2002 Coach Edition RX 300', '2005 Thundercloud Edition RX 330', '2009 Pebble Beach Edition RX 350', '2011 Stone Works "Sunlight" RX 350', '2007 Limited Edition LX 470'
         , '2003 LF-X: crossover', '2003 LF-S: luxury sedan', '2004 LF-C: convertible', '2005 LF-A: sports coupe', '2006 LF-Sh: hybrid luxury sedan', '2007 LF-Xh: hybrid crossover'
         , '2008 LF-AR: roadster', '2009 LF-Ch: compact hybrid', '2011 LF-Gh: hybrid touring sedan', '2012 LF-LC: hybrid coupe', '2013 LF-NX: small crossover SUV', '2013 LF-C2: RC convertible'
         , '2015 LF-SA: Compact car[1]', '2015 LF-FC: Fuel Cell concept[2]', '2018 LF-1: Limitless concept[3]', '2003 Lexus IS 430 sports sedan', '2004 Carolina Herrera SC 430 CH'
         , '2005 Milan Design Week "L-finesse" LF-A', '2006 Milan Design Week "Evolving Fiber" LS 460', '2007 Higashifuji Driving Simulator LS 460', '2007 Milan Design Week "Invisible Garden" LS 600h L'
         , '2008 Milan Design Week "Elastic Diamond" LF-Xh', '2008 IS F Racing concept', '2009 LS 460 ITS-Safety Concept', '2009 Crystallised Wind LFA', '2010 IS F CCS Concept'
         , '2010 CT Umbra', '2011 CT Racing concept', '1994 Italdesign Lexus Landau: hatchback', '1995 Lexus FLV: station wagon', '1997 Lexus Street Rod: roadster', '1997 Lexus SLV: sport luxury vehicle'
         , '1997 Lexus HPS: sports sedan', '1999 Lexus Sports Coupe: convertible', '2003 Lexus HPX: crossover', '2009 Lexus HB: hybrid sports motorbike', '2016 Lexus UX: crossover'
         , '2017 Lexus LS+: luxury sedan', '2019 Lexus LY-650 Yacht[4]', '2002 Lexus 2054'];

         $parent = TaxonomyManager::register('Lexus', 'car-manufacturer');

         foreach ($lexuses as $key => $lexus) {
             TaxonomyManager::register($lexus, 'car-lexus', $parent->term->id);
         }
 
         TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
