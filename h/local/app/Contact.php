<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table ='contacts';

    protected $fillable=['title','content','user_id','email',];

    public $timestamp=true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
