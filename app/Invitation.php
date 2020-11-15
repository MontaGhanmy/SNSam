<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Invitation extends Model
{
    protected $fillable = [
    'user_id',
    'code',
    'note',
    'disabled',
    ];

    protected $casts = [
    'disabled' => 'boolean',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            if (!$post->user_id) {
                $post->user_id = \Auth::id();
            }
        });
    }
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
