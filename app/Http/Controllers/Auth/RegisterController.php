<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use DB;


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
    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'admin':
            $this->redirectTo = '/admin';
            return $this->redirectTo;
                break;
            case 'marketer':
                    $this->redirectTo = '/marketer';
                return $this->redirectTo;
                break;
                case 'user':
                    $this->redirectTo = '/dashboard';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
    }

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'address'  => ['nullable','string','min:3'],
            'state' => ['nullable','string','min:2'],
            'city' => ['nullable','string','min:2'],
            'zipcode' => ['nullable','digits_between:6,6'],
            'phone' =>['nullable', 'digits_between:6,15','unique:users'],
            'country' => ['nullable','min:2', 'string'],
        ]);
        // return $request->input();

        $user = new User();
        $user->name= ucwords($request->input('name'));
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        $user->address= ucwords($request->input('address'));
        $user->city=ucwords($request->input('city'));
        $user->state=ucwords($request->input('state'));
        $user->country=ucwords($request->input('country'));
        $user->zipcode=$request->input('zipcode');
        $user->password=bcrypt($request->input('password'));
        $user->picture_id="login.png";
        $user->provider ="Soupe Register";
        $user->provider_id = $user->generateuserid();
        $user->save();
        return redirect('/dashboard');


    }
}
