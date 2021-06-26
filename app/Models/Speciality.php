<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];
    
    public function specialities(){
        return $this->BelongsTo('App\Models\Speciality');
    }
}
