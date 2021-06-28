<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
   use HasFactory;
   protected $fillable = [
    'entity',
    'action',
    'table',
    'user_id'
];
   public function user(){
    return $this->belongsTo('App\Models\User');
   }
}
