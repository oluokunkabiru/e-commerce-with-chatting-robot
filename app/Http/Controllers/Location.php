<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midnite81\GeoLocation\Contracts\Services\GeoLocation;

class Location extends Controller
{
    //
  public  function locate(GeoLocation $geo, Request $request){
    $ipLocation = $geo->getCity($request->ip());

    // if you do $geo->get($request->ip()), the default precision is now city

    // $ipLocation is an IpLocation Object

    echo $ipLocation->ipAddress; // e.g. 127.0.0.1

    echo $ipLocation->getAddressString(); // e.g. London, United Kingdom

    // the object has a toJson() and toArray() method on it
    // so you can die and dump an array.
    dd($ipLocation->toArray());
  }


}
