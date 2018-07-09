<?php

namespace App;

class Attachment extends Model
{
    public function pages()
    {
        return $this->morphedByMany('App\Page', 'attachable');
    }

    public function posts()
    {
        return $this->morphedByMany('App\Post', 'attachable');
    }

    public function users()
    {
        return $this->morphedByMany('App\User', 'attachable');
    }
}
