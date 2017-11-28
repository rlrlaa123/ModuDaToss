<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesInfo extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'Sales_infos';

     public $primarykey = 'salesinfo_id';

     public $timestamps = true;

    protected $fillable = [
        'CustomerName',
        'BusinessName',
        'CustomerAddress',
        'PhoneNumber',
        'ContactTime',
        'Characteristic',
        'Category',
        'note',
        'CustomerEmail',
        'pay',
        'SalesPerson_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
