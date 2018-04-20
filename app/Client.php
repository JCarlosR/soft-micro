<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'IMEI',
        'phoneNumber',
        'type',
        'username',
        'password'
    ];

//    public function clients()
//    {
//        return $this->belongsTo(Client::class);
//    }
}
