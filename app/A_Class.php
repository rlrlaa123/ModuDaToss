<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class A_Class extends Model
{
    protected $table = 'a_classes';

    public $timestamps = false;

    protected $fillable = [
        'a_class_id',
        'a_class_recommend_code',
        'recommend_commissioner_id'
    ];
}