<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id', 'transaction_id','debit','credit'
    ];

    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }
}
