<?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    public function picture()
    {
        return $this->belongsTo('App\Models\Picture');
    }
}
