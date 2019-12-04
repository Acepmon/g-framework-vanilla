<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarLoanTermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $loanTerms = [
            '12' => ['interest' => 2.55],
            '24' => ['interest' => 2.60],
            '30' => ['interest' => 2.65],
            '36' => ['interest' => 2.70],
            '42' => ['interest' => 2.75]
        ];

        foreach ($loanTerms as $loanTerm => $metas) {
            TaxonomyManager::register($loanTerm, 'car-loan-terms', null, $metas);
        }
    }
}
