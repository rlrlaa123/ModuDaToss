<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etc extends Model
{
    protected $table = 'etc';

    public $timestamps = false;

    protected $fillable = [
        'front_img1',
        'front_img2',
        'front_img3',
    ];

    protected $hidden = [

    ];
}
