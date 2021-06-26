<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'latitude',
        'longitude',
        'details',
        'number',
        'user_id',
        'section_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }


}
