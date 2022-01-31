<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model
{
    public function merchant(){
    	return $this->belongsTo('App\Merchant','merchant_id');
    }
    public function pinUsage(){
    	return $this->hasOne('App\PinUsage');
    }
}
