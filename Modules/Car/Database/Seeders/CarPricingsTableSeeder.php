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
        TaxonomyManager::register('3 Day (12,000 ₮)', 'premium', null, [
            'amount' => 12000,
            'unit' => '₮',
            'duration' => 3
        ]);

        TaxonomyManager::register('7 Day (25,000 ₮)', 'premium', null, [
            'amount' => 25000,
            'unit' => '₮',
            'duration' => 7
        ]);

        TaxonomyManager::register('15 Day (50,000 ₮)', 'premium', null, [
            'amount' => 50000,
            'unit' => '₮',
            'duration' => 15
        ]);

        TaxonomyManager::register('30 Day (90,000 ₮)', 'premium', null, [
            'amount' => 90000,
            'unit' => '₮',
            'duration' => 30
        ]);

        TaxonomyManager::register('3 Day (40,000 ₮)', 'best_premium', null, [
            'amount' => 12000,
            'unit' => '₮',
            'duration' => 3
        ]);

        TaxonomyManager::register('7 Day (80,000 ₮)', 'best_premium', null, [
            'amount' => 25000,
            'unit' => '₮',
            'duration' => 7
        ]);

        TaxonomyManager::register('15 Day (160,000 ₮)', 'best_premium', null, [
            'amount' => 50000,
            'unit' => '₮',
            'duration' => 15
        ]);

        TaxonomyManager::register('30 Day (280,000 ₮)', 'best_premium', null, [
            'amount' => 90000,
            'unit' => '₮',
            'duration' => 30
        ]);
    }
}
