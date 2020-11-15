<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OneKey extends Model
{
    protected $table = 'one_key';
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
