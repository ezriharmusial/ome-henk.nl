<?php

namespace App;

class Media extends Model
{
    public function mediable()
    {
        return $this->morphTo();
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
