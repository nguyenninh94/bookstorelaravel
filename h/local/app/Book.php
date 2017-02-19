<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table ='books';

    protected $fillable=['name','alias','qty','image','content','price','day_publish','discount','publisher','author_id','cate_id','admin_id',];

    public $timestamp=true;

    public function author()
    {
    	return $this->belongsTo('App\Author');
    }

    public function cate()
    {
    	return $this->belongsTo('App\Category');
    }

    public function admin()
    {
    	return $this->belongsTo('App\Admin');
    }

    public function cart()
    {
    	return $this->hasMany('App\Cart');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
