<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarPricingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxonomyManager::register('3 Өдөр (12,000 ₮)', 'premium', null, [
            'amount' => 12000,
            'unit' => '₮',
            'duration' => 3
        ]);

        TaxonomyManager::register('7 Өдөр (25,000 ₮)', 'premium', null, [
            'amount' => 25000,
            'unit' => '₮',
            'duration' => 7
        ]);

        TaxonomyManager::register('15 Өдөр (50,000 ₮)', 'premium', null, [
            'amount' => 50000,
            'unit' => '₮',
            'duration' => 15
        ]);

        TaxonomyManager::register('30 Өдөр (90,000 ₮)', 'premium', null, [
            'amount' => 90000,
            'unit' => '₮',
            'duration' => 30
        ]);

        TaxonomyManager::register('3 Өдөр (40,000 ₮)', 'best_premium', null, [
            'amount' => 40000,
            'unit' => '₮',
            'duration' => 3
        ]);

        TaxonomyManager::register('7 Өдөр (80,000 ₮)', 'best_premium', null, [
            'amount' => 80000,
            'unit' => '₮',
            'duration' => 7
        ]);

        TaxonomyManager::register('15 Өдөр (160,000 ₮)', 'best_premium', null, [
            'amount' => 160000,
            'unit' => '₮',
            'duration' => 15
        ]);

        TaxonomyManager::register('30 Өдөр (280,000 ₮)', 'best_premium', null, [
            'amount' => 280000,
            'unit' => '₮',
            'duration' => 30
        ]);
    }
}
