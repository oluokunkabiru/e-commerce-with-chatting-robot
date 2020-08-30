<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable =[
        'product_name', 'billing_zipcode', 'billing_address', 'billing_email','user_id','picture_id',
        'status', 'quantity','billing_country','billing_state','billing_city','billing_phone', 'billing_price',
        'billing_total_price', 'billing_payment_method','product_id','orderid', 'delivered_by'
    ];

    public function picture(){
        return $this->belongsTo('App\Picture');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function orders(){
        return $this->hasMany('App\Product');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
