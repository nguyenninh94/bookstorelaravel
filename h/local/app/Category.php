<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $table ='categories';

    protected $fillable=['name','parent_id',];

    public $timestamp=true;

    public function book()
    {
    	return $this->hasMany('App\Book');
    }
}
