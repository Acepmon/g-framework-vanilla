<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CarManufactureMiniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minis = ['Mini Mark I (1969 to 2000)', 'Mini Mark II (1967 to 1970)', 'Mini Marks III (1969 to 2000)', 'Mini Marks IV (1969 to 2000)', 'Mini Marks V (1969 to 2000)', 'Mini Marks VI (1969 to 2000)', 'Mini Marks VII (1969 to 2000)',
         'Mini Hatch/Hardtop (2001 to 2006)', 'Mini Convertible/Cabrio (2005 to 2008)', 'Mini Hatch/Hardtop (2007 to 2014)', 'Mini Clubman (2008 to 2014)', 'Mini Convertible (2009 to 2015)', 'Mini Countryman (2011 to 2016)', 
         'Mini Coupé (2012 to 2015)', 'Mini Roadster (2012 to 2015)', 'Mini Paceman (2013 to 2016)', 'Mini Hatch/Hardtop (2014 to present)'];

        $parent = TaxonomyManager::register('Mini', 'car-manufacturer');

        foreach ($minis as $key => $mini) {
            TaxonomyManager::register($mini, 'car-mini', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
