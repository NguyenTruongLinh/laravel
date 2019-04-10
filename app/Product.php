<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function product_type(){
    	return $this->belongsTo('app\ProductType', 'id_type', 'id');
    }

    public function product_type(){
    	return $this->hasMany('app\BillDetail', 'id_product', 'id');
    }
}
