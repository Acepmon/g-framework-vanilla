<?php

namespace Modules\Payment\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Payment\Entities\PaymentMethod;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Bank Transaction
        PaymentMethod::create([
            'code' => 'transaction',
            'name' => 'Bank Transaction',
            'data' => json_encode([
                [
                    'bankName' => 'Хаан Банк',
                    'accountNo' => '00000000',
                    'accountName' => 'Example',
                    'accountCurrency' => 'MNT'
                ],
                [
                    'bankName' => 'Хас Банк',
                    'accountNo' => '00000000',
                    'accountName' => 'Example',
                    'accountCurrency' => 'MNT'
                ],
                [
                    'bankName' => 'Голомт Банк',
                    'accountNo' => '00000000',
                    'accountName' => 'Example',
                    'accountCurrency' => 'MNT'
                ],
                [
                    'bankName' => 'Худалдаа Хөгжлийн Банк',
                    'accountNo' => '00000000',
                    'accountName' => 'Example',
                    'accountCurrency' => 'MNT'
                ],
                [
                    'bankName' => 'Төрийн Банк',
                    'accountNo' => '00000000',
                    'accountName' => 'Example',
                    'accountCurrency' => 'MNT'
                ]
            ]),
            'enabled' => true
        ]);

        // Card Local
        PaymentMethod::create([
            'code' => 'card-khanbank',
            'name' => 'Khanbank Card',
            'data' => null,
            'enabled' => false
        ]);

        // Social Pay
        PaymentMethod::create([
            'code' => 'socialpay',
            'name' => 'Social Pay',
            'data' => null,
            'enabled' => false
        ]);
        
        // MostMoney
        PaymentMethod::create([
            'code' => 'mostmoney',
            'name' => 'MostMoney',
            'data' => null,
            'enabled' => false
        ]);

        // Lendmn
        PaymentMethod::create([
            'code' => 'lendmn',
            'name' => 'Lend MN',
            'data' => null,
            'enabled' => false
        ]);

        // Credit Card
        PaymentMethod::create([
            'code' => 'card-credit',
            'name' => 'Credit Card',
            'data' => null,
            'enabled' => false
        ]);

        // Debit Card
        PaymentMethod::create([
            'code' => 'card-debit',
            'name' => 'Debit Card',
            'data' => null,
            'enabled' => false
        ]);
    }
}
