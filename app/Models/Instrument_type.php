<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function instruments(){
        return $this->hasMany('App\Models\Instrument');
    }
}
