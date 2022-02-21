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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->where('estado',1);
    }

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
}
