<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['categories_name', 'categories_desc'];
    public $timestamps = true;

    public function event()
    {
        return $this->hasMany('App\Event');
    }
}
