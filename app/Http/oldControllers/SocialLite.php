<?php

namespace App\Http\Controllers;

use App\User;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class SocialLite extends Controller
{
    //
    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }

    // incoming request
    public function Callback($provider){

        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $user       =   User::where(['email' => $userSocial->getEmail()])->first();
        if($user){
            Auth::login($user);
            return redirect('/');
        }else{
             $role ="user";
             $status ="free";



            $user = new User();
            $user->name=$userSocial->getName();
            $user->email=$userSocial->getEmail();

             if($userSocial->getAvatar())
                {
                    $file_name=$userSocial->getAvatar();
                    $photo = new picture;
                    $photo->file = $file_name;
                    $photo->save();
                    $user->picture_id = $photo->id;
                }
            $user->provider_id   = $userSocial->getId();
                $user->provider     = $provider;

                $user->status = $status;
                $user->role   =  $role;
                $user->save();

        }
        return redirect('dashboard');
    }

     //
    //  public function redirect($provider)
    //  {
    //   return Socialite::driver($provider)->redirect();
    //  }

     // incoming request
//      public function Callback($provider){

//          $userSocial =   Socialite::driver($provider)->stateless()->user();
//          $users       =   User::where(['email' => $userSocial->getEmail()])->first();
//          if($users){
//              Auth::login($users);
//              return redirect('/');
//          }else{
//               $role ="users";
//               $status ="free";

//              $user = User::create([
//                  'name'          => $userSocial->getName(),
//                  'email'         => $userSocial->getEmail(),
//                  'image'         => $userSocial->getAvatar(),
//                  'provider_id'   => $userSocial->getId(),
//                  'provider'      => $provider,

//                  'status'        =>  $status,
//                  'role'          =>  $role,
//              ]);
//              return redirect('home');
//          }
//  }
}
