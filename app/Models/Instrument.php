<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'price',
        'stock',
        'instrument_type_id'
    ];

    public function instrument_type(){
        return $this->belongsTo('App\Models\Instrument_type');
    }

}
