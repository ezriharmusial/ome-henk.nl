<?php

namespace App;

use Illuminate\Http\Request;

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
                return in_array($file->mimeType, ['image/jpeg', 'image/png', 'image/gif', 'image/tiff']);
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

    public function addPost(Request $request)
    {
        $post = $this->posts()->create([
            'title' => request('title'),
            'subtitle' => request('subtitle'),
            'content' => request('content'),
            'published' => request('published'),
            'page_id' => $this->id,
            'user_id' => auth()->id(),
        ]);

        if($request->hasFile('featured-image')){
            $post->addMediaFromRequest('featured-image')->toMediaCollection('featured-images');
        }

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
