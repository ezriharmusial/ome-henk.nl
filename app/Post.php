<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->title);
        });
    }

    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
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
                $query->whereMonth('created_at', Carbon::parse($month)->month);
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
