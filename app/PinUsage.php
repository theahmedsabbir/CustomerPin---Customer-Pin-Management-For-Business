<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PinUsage extends Model
{    
    public function visitor(){
    	return $this->belongsTo('App\Visitor','visitor_id');
    }
}
