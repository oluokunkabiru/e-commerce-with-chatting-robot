<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderHistory extends Model
{
    //
    protected $fillable = [
        'history', 'users_id'
    ];

    public function picture(){
        return $this->belongsTo('App\Picture');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function order(){
        return $this->belongsTo('App\Order');
    }

}
