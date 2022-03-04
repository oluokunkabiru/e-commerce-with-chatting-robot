<?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        return $this->belongsTo('App\Models\Picture');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function orders(){
        return $this->hasMany('App\Models\Product');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function productOwner($id){
       $user = User::with('picture')->first();
        return $user;
    }

}
