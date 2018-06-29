<?php

namespace App;

class Page extends Model
{
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->title);
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addPost($featured_image, $title, $subtitle, $content, $published)
    {
        $this->posts()->create([
            'featured_image' => $featured_image,
            'title' => $title,
            'subtitle' => $subtitle,
            'content' => $content,
            'published' => $published,
            'page_id' => $this->id,
            'user_id' => auth()->id()
        ]);
    }

    public static function pages()
    {
        if ( auth()->guest() ) {
            return static::where('published', 1)->get()->toArray();
        } else {
            return static::get()->toArray();
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
