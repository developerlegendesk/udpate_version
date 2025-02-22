<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceEntry extends Model
{
    protected $fillable = [
        'invoice_id', 'description', 'amount'
    ];

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
}
