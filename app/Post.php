<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Tags\HasTags;
use Auth;

class Post extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, HasTags;

    protected $fillable = [
    'user_id',
    'banner',
    'file',
    'category_id',
    'title',
    'summary',
    'body',
    'featured',
    'published',
    'slug',
    ];

    protected $casts = [
    'featured' => 'boolean',
    'published' => 'boolean',
    ];
    protected $dates = [
        'from', 'to'
    ];
    public function registerMediaCollections()
    {
        $this->addMediaCollection('banner')->singleFile();
        $this->addMediaCollection('file')->singleFile();
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if (!$post->user_id) {
                $post->user_id = \Auth::id();
            }
        });
    }
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
