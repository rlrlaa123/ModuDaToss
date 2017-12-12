<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Savinghistory extends Model
{
    //
    protected $table = 'savinghistories';

    public $timestamps = true;

    protected $fillable = [
         'SalesPerson_id',
         'SalesPerson_name',
         'MoneyType',
         'MoneySum',
         'created_at'
    ];

     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
    protected $hidden = [

    ];
}
