<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Page extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    protected $fillable = [
    'user_id',
    'banner',
    'title',
    'summary',
    'body',
    'published',
    'slug',
    ];

    protected $casts = [
    'published' => 'boolean',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('banner')->singleFile();
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if (!$post->user_id) {
                $post->user_id = Auth::id();
            }
        });
    }
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
