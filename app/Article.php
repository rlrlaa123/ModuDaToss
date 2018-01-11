<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'dashboard_id',
    ];

    protected $with = [
        'user',
    ];

    /* Relationships */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
//    public function tags() {
//        return $this->belongsToMany(Tag::class);
//    }
    public function dashboard()
    {
        return $this->belongsTo(Dashboard::class);
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
