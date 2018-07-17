<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\File;

class Page extends Model implements HasMedia
{
    use HasMediaTrait;

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->title);
        });
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('page-headers')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })->singleFile();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('full')
              ->width(1280)
              ->height(640)
              ->withResponsiveImages();
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addPost($title, $subtitle, $content, $published)
    {
        $this->posts()->create([
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
