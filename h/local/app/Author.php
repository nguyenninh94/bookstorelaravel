<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
     protected $table ='authors';

    protected $fillable=['name',];

    public $timestamp=true;

    public function book()
    {
    	return $this->hasMany('App\Book');
    }
}
