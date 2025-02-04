<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_of_client'
    ];

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }
}
