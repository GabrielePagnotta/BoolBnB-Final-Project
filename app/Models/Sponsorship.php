<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $table='sponsorships';
    public $timestamps = false;

    public function apartments(){
        return $this->belongsToMany('App\Models\Apartment');
    }
}
