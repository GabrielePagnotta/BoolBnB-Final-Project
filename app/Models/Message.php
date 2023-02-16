<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'email',
        'message',
        'date',
        'first_name',
        'last_name',
        'apartmentId',
    ];

    public function apartment(){
        return $this->belongTo('App/Apartment');
    }
}
