<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Picture;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    function username($name){
        $username = strtolower(str_replace(" ", "_", $name));
        $last = User::orderBy('id', 'desc')->where('username','LIKE','%'.$username.'%')->first();
        if($last != null){
            $prevUname = $last->username;
           $extractUname = explode($username, $prevUname);
           $number = $extractUname[1];
           $newNumber  = isset($number) && is_numeric($number)?$number+1:0;
            $newUname = $username.$newNumber;
           return $newUname;
       }
       return $username;
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'address'  => ['nullable','string','min:3'],
            'state_id' => ['nullable','string','min:2'],
            'city_id' => ['nullable','string','min:2'],
            'zipcode' => ['nullable','digits_between:6,6'],
            'phone' =>['nullable', 'digits_between:6,15','unique:users'],
            'country_id' => ['nullable','min:2', 'string'],
        ]);
        // return $request->input();
        $picture = Picture::count('id');
        $defaut = 'login.png';
        if($picture<1){
        Picture::create(['file'=> $defaut]);
        }
        $user = new User();
        $user->name= ucwords($request->input('name'));
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        $user->address= ucwords($request->input('address'));
        $user->city_id=ucwords($request->input('city_id'));
        $user->state_id=ucwords($request->input('state_id'));
        $user->country_id=ucwords($request->input('country_id'));
        $user->zipcode=$request->input('zipcode');
        $user->password=bcrypt($request->input('password'));
        $user->picture_id="1";
        $user->provider ="Soupe Register";
        $user->provider_id = $user->generateuserid();
        $user->username = $this->username($request->name);
        $user->save();
        return redirect('/dashboard');

    }
}
