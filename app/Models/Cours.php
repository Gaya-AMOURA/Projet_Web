<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $table = 'cours';

    public $timestamps = false;

    function planning(){
        return $this->HasMany(Planning::class, 'id');
    }

    function user(){
        return $this->belongsTo(User::class, 'id');
    }

    function formation(){
        return $this->belongsTo(Formation::class, 'id');
    }
}
