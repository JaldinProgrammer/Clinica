<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'zoomLink',
        'user_id',
        'reservation_id'
    ];

    public function reservation(){
        return $this->belongsTo('App\Models\Reservation');
    }

    public function attention(){
        return $this->hasOne('App\Models\Reservation');
    }

}
