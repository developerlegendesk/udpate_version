<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'clienttype_id', 'account_id', 'address', 'phone', 'email', 'person',
        'tax', 'registration', 'incorporation'
    ];

    public function clientType()
    {
        return $this->belongsTo('App\Models\ClientType');
    }

    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }
}
