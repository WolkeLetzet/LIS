<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function usuarios(){
        return $this->belongsToMany(User::class,'curso_user','curso_id','user_id');
    }
    public function scopeAvailable($query){

        return $query->where('estado',true);
    }

    public function scopeNameQuery($query,$name){

        return $query->where('estado',true)->where('nombre','LIKE',"%$name%");
    }
}
