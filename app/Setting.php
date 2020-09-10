<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    public function picture()
    {
        return $this->belongsTo('App\Picture');
    }
}
