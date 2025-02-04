<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'ref','date_of_transaction','description'
    ];

    public function entries()
    {
        return $this->hasMany('App\Models\Entry');
    }

}
