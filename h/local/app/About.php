<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
     protected $table ='abouts';

    protected $fillable=['address','phone','email','description',];

    public $timestamp=true;
}
