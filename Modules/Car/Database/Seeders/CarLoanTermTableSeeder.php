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
            '6' => ['interest' => 2.5],
            '12' => ['interest' => 2.5],
            '18' => ['interest' => 2.6],
            '24' => ['interest' => 2.7],
            '30' => ['interest' => 2.8]
        ];

        foreach ($loanTerms as $loanTerm => $metas) {
            TaxonomyManager::register($loanTerm, 'car-loan-terms', null, $metas);
        }
    }
}
