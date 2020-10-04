<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

protected $fillable = [
    'email', 'name', 'user_id', 'messages'
];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function picture(){
        return $this->belongsTo('App\Picture');
    }
}
