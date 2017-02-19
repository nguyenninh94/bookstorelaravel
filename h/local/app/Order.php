<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
     protected $table ='orders';

    protected $fillable=['name','address','email','phone','total','status','place_order'];

    public $timestamp=true;

    public function cart()
    {
    	return $this->hasMany('App\Cart');
    }
}
