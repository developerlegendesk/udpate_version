<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'head_of_account', 'type_id'
    ];

    public function type(){
        return $this->belongsTo('App\Models\Type');
    }

    public function entries()
    {
        return $this->hasMany('App\Models\Entry');
    }

    public function client()
    {
        return $this->hasOne('App\Models\Client');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }

    public function receipts()
    {
        return $this->hasMany('App\Models\Receipt');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payment','account_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }
}
