<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function author(){
    	return $this->belongsTo('App\Author');
    }
}
