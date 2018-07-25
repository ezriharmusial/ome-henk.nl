<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\File;

use Spatie\Permission\Traits\HasRoles;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('avatar')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, ['image/jpeg', 'image/png', 'image/gif', 'image/tiff']);
            })->singleFile();
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('mini')
              ->width(48)
              ->height(48);

        $this->addMediaConversion('thumb')
              ->width(256)
              ->height(256);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function publishPost(Post $post)
    {
        $this->posts()->save($post);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    public function publishPage(Page $page)
    {
        $this->pages()->save($page);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
