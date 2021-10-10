<?php

// namespace App;

// use Illuminate\Database\Eloquent\Model;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{

     //
     protected $date =['deleted'];

     public $directory="asset/images/";
     protected $fillable = ['file'];

     public function getFileAttribute($value)
 {
    if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
      }
      else{
           return $this->directory . $value;
      }

 }
}
