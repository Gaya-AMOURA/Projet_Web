<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
   use HasFactory;

    public $timestamps = false;

	function cours(){
        return $this->hasMany(Cours::class, 'formation_id');
    }

    function user(){
        return $this->hasMany(User::class, 'formation_id');
    }
}