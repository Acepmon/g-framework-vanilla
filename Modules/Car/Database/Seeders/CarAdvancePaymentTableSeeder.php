<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarAdvancePaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $advancePaymentPercents = ['20', '30', '40', '50', '60', '70', '80'];

        foreach ($advancePaymentPercents as $key => $advancePayment) {
            TaxonomyManager::register($advancePayment, 'car-advance-payments');
        }
    }
}
