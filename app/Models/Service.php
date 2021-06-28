<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'price',
        'description'
    ];

    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }

    public function attentions(){
        return $this->hasMany('App\Models\Attention');
    }
}
