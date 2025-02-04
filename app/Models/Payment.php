<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'ref', 'date_of_payment', 'account_id', 'description', 'mode', 'cheque', 'payee', 'amount'
    ];

    public function account()
    {
        return $this->belongsTo('App\Models\Account','account_id');
    }
}
