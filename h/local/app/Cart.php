<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='carts';

	protected $fillable=['order_id','book_id','sub_total','qty_buy',];

	public $timestamp=true;

    public function book()
    {
    	return $this->belongsTo('App\Book');
    }

    public function order()
    {
    	return $this->belongsTo('App\Order');
    }
}
