<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCenter extends Model
{
    protected $table = 'servicecenter';

    public $primarykey = 'id';

    public $timestamps = true;

    protected $fillable = [
//        'title',
//        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
//    public function tags() {
//        return $this->belongsToMany(Tag::class);
//    }

//    public function comments()
//    {
//        return $this->morphMany(Comment::class, 'commentable');
//    }
}
/* Relationships */

