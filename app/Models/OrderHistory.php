<?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderHistory extends Model
{
    //
    protected $fillable = [
        'history', 'users_id'
    ];

    public function picture(){
        return $this->belongsTo('App\Models\Picture');
    }
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function order(){
        return $this->belongsTo('App\Models\Order');
    }

}
