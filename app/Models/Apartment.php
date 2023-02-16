<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $table = 'apartments';

    protected $fillable = [
        'title',
        'rooms',
        'bedrooms',
        'bathrooms',
        'latitude',
        'longitude',
        'square_meters',
        'price',
        'visibility',
        'image',
        'address',
        'userId'
    ];

    public function user(){
        return $this->belongTo('App/User');
    }

    public function message(){
        return $this->hasMany('App/Messages');
    }
}
