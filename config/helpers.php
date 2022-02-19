<?php

// use App\Models\Configuration;

use App\Http\Controllers\DriverLicense;
use App\Models\Application;
use App\Models\Driver_licence;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

if(! function_exists('appSettings')){
        function appSettings(){
            $config = Setting::first();
        return $config;
    }
}

    if(! function_exists('totalUsers')){
        function totalUsers(){
            $config = User::get();
return count($config);
    }
}

    if(! function_exists('totalApplicant')){
        function totalApplicant(){
            $config = Application::get();
        return count($config);
    }
    }

    if(! function_exists('totalLicence')){
        function totalLicence(){
            $config = Driver_licence::get();
        return count($config);
    }
    }

    if(! function_exists('limitText')){
        function limitText($text, $limit) {
            if (str_word_count($text, 0) > $limit) {
                $words = str_word_count($text, 2);
                $pos   = array_keys($words);
                $text  = substr($text, 0, $pos[$limit]) . '...';
            }
            return $text;
        }
    }


    if(! function_exists('myrole')){
        function myrole(){
            $roles = Auth::user()->getRoleNames()[0];
            $role = Role::findByName($roles);
            return $role;

    }
}


?>
