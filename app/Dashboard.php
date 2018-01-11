<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'dashboards';

    public $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [

    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
