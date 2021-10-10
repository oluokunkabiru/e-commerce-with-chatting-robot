<?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderdProdct extends Model
{
    //
    protected $fillable =[
        'order_id', 'product_id', 'quantity',
    ];
}
