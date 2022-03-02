<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function files(){
        return $this->hasMany(File::class,'article_id','id')->where('estado',1);
    }
    /**
     * Get the user associated with the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function video()
    {
        return $this->hasOne(Video::class)->where('estado',1);
    }


    public function scopeTitle($query, $title)
    {
        return $query->where('title','LIKE', '%'.$title.'%')->where('estado',true)
                    ->orWhere('descrip','LIKE',"%$title%")->where('estado',true);
    }

    public function usuarios(){
        return $this->belongsToMany(User::class,'article_user','curso_id','user_id');
    }
    public function scopeAvailable($query){

        return $query->where('estado',true);
    }

    public function scopeNameQuery($query,$name){

        return $query->where('estado',true)->where('title','LIKE',"%$name%");
    }
}
