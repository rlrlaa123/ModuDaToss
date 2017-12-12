<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdrawalInfo extends Model
{
    //
    protected $table = 'withdrawal_infos';

    public $primarykey = 'id';

    public $timestamps = true;

   protected $fillable = [
       'memberID',
       'memberName',
       'bankName',
       'account_number',
       'requestmoney',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [

   ];
}
