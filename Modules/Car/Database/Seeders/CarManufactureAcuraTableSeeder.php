<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureAcuraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acuras = ['Acura CL-X', 'Acura ARX-01', 'Acura ARX-02a', 'Acura CDX', 'Acura CL', 'Acura CSX', 'Acura EL', 'Acura ILX', 'Acura Integra', 'Acura Legend', 'Acura MDX', 'Acura NSX'
        , 'Acura RDX', 'Acura RL', 'Acura RLX', 'Acura RSX', 'Acura SLX', 'Acura TL', 'Acura TLX', 'Acura TSX', 'Acura Vigor', 'Acura ZDX', 'Template:Acura'];

        $parent = TaxonomyManager::register('Acura', 'car-manufacturer');

        foreach ($acuras as $key => $acura) {
            TaxonomyManager::register($acura, 'car-acura', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
