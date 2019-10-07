<?php

use Illuminate\Http\Request;

use Modules\Payment\Entities\PaymentMethod;
use Modules\Payment\Transformers\PaymentMethod as PaymentMethodResource;
use Modules\Payment\Transformers\PaymentMethodCollection;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('payment_methods', function () {
    return new PaymentMethodCollection(PaymentMethod::where('enabled', true)->paginate());
});