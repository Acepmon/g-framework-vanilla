<?php

namespace Modules\Payment\Entities;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'payment_transactions';

    protected $fillable = ['user_id', 'payment_method', 'transaction_type', 'transaction_amount', 'transaction_usage', 'bonus', 'current_amount', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
