<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\File;

class Post extends Model implements HasMedia
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
            ->addMediaCollection('featured-images')
            ->acceptsFile(function (File $file) {
                return $file->mimeType === 'image/jpeg';
            })->singleFile();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('full')
              ->width(800)
              ->height(600)
              ->withResponsiveImages();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function addComment($body)
    {
        $this->comments()->create([
            'body' => $body,
            'user_id' => auth()->id()
        ]);
    }

    public function scopeFilter($query, $filters)
    {
        if (! empty($filters))
        {
            if ($month = $filters['month']) {
                $query->whereMonth('created_at', carbon()->parse($month)->month);
            }

            if ($year = $filters['year']) {
                $query->whereYear('created_at', $year);
            }
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
