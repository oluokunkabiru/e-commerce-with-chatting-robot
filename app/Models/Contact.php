<?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

protected $fillable = [
    'email', 'name', 'user_id', 'messages'
];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function picture(){
        return $this->belongsTo('App\Models\Picture');
    }
}
