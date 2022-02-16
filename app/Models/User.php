<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public $timestamps = false;

    protected $hidden = ['mdp'];

    protected $fillable = ['login', 'mdp', 'type'];

    protected $attributes = ['type' => 'NULL'];

    public function getMDP(){
        return $this->mdp;
    }

    public function EstAdmin(){
        return $this->type == 'admin';
    }

    public function EstEtudiant(){
        return $this->type == 'etudiant';
    }

    public function EstEnseignant(){
        return $this->type == 'enseignant';
    }

    function formation(){
        return $this->belongsTo(Formation::class,'id');
    }

    function cours(){
        return $this->hasMany(Cours::class, 'user_id');
    }

}