<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = 'categories';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'category',
        'commision',
        'content',
        'image',
    ];

    protected $hidden = [

    ];
}
