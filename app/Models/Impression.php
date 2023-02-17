<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Impression extends Model
{
    protected $table = 'impressions';

    protected $fillable = [
        'ipAddress',
        'apartmentId'
    ];


    public function apartment(){
        return $this->belongsTo('App\Models\Impression');
    }

}
