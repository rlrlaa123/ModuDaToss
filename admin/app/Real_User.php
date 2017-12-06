<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Real_User extends Model
{
    protected $table = 'users';

    public $primarykey = 'id';

    public $timestamps = true;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}