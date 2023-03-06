<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'email',
        'message',
        'apartmentId',
    ];

    public function apartment(){
        return $this->belongTo('App/Apartment');
    }
}
