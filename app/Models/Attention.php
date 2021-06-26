<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attention extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkIn',
        'checkOut',
        'totalPrice',
        'patient_id',
        'nurse_id',
        'patient_id',
        'schedule_id',
        'service_id',
        'date',
        'ostia'
    ];
    protected $dates = [
        'date'
    ];
    public function schedule(){
        return $this->belongsTo('App\Models\Schedule');
    }

    public function nurse(){
    return $this->belongsTo(User::class, 'nurse_id');
    }

    public function patient(){
    return $this->belongsTo(User::class, 'patient_id');
    }

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }
}
