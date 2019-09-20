<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{   
    protected $table = 'event';
    protected $casts = [
        'id' => 'string'
    ];
    public $timestamps = false;
    
    public function categories()
    {
        return $this->belongsTo('App\Categories', 'categories_id', 'id');
    }
}
