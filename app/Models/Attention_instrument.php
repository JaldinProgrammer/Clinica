<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attention_instrument extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'instrument_id',
        'attention_id',
    ];
    public function attention(){
        return $this->belongsTo('App\Models\Attention');
    }
    public function instrument(){
        return $this->belongsTo('App\Models\Instrument');
    }
}
