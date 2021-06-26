<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'details',
        'status',
        'time',
        'virtualMeeting',
        'virtualPayment',
        'location_id',
        'user_id',
        'service_id'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at',
        'date',
        'time'
    ];
    public function location(){
        return $this->belongsTo('App\Models\Location');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function service(){
        return $this->belongsTo('App\Models\Service');
    }

    public function schedules(){
        return $this->hasMany('App\Models\Schedule');
    }
}
