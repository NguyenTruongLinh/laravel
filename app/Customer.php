<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "custommer";

    public function bill(){
    	return $this->hasMany('app\Bill', 'id_customer', 'id');
    }
}
