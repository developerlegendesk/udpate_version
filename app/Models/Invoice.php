<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'ref','date_of_invoice','account_id','paid'
    ];

    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }

    public function invoiceEntries()
    {
        return $this->hasMany('App\Models\InvoiceEntry');
    }

    public function receipt()
    {
        return $this->hasOne('App\Models\Receipt');
    }

}
