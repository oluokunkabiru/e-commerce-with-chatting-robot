<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     //
     protected $fillable =[
        'picture_id', 'name', 'location', 'oldprice', 'newprice', 'quantity', 'marketer_name',
        'description', 'category','user_location', 'user_ipaddress', 'user_browser',
    ];
    public function picture()
    {
        return $this->belongsTo('App\Picture');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }

}
