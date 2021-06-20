<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Speciality extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'speciality_id'
    ];

    public function speciality(){
        return $this->BelongsTo('App\Models\Speciality');
    }

    public function user(){
        return $this->BelongsTo('App\Models\User');
    }
}
