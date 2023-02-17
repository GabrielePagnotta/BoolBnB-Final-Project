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
        return $this->belongTo('App\User');
    }

    public function message(){
        return $this->hasMany('App\Models\Messages');
    }

    public function services(){
        return $this->hasMany('App\Models\Services');
    }

    public function sponsorships(){
        return $this->belongsToMany('App\Models\Sponsorship');
    }

    public function impressions(){
        return $this->hasMany('App\Models\Impression');
    }
}
