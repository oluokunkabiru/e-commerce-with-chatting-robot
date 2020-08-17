<?php

namespace App\Http\Controllers;

use App\User;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => ['sometimes','nullable', 'string', 'max:255'],
            'email' => ['sometimes','nullable', 'string', 'email', 'max:255', 'unique:users,email,'. Auth::user()->id],
            'password' => ['sometimes','nullable', 'string', 'min:5', 'confirmed'],
            'address'  => ['sometimes','nullable','string','min:3'],
            'state' => ['sometimes','nullable','string','min:2'],
            'city' => ['sometimes','nullable','string','min:2'],
            'zipcode' => ['sometimes','nullable','digits_between:6,6'],
            'phone' =>['sometimes','nullable', 'digits_between:6,15','unique:users,phone,'. Auth::user()->id],
            'country' => ['sometimes','nullable','min:2', 'string'],
            'role' => ['sometimes','nullable', 'string'],
            'image' => ['sometimes','nullable', 'file'],
        ]);
        $user=User::where('id', $id)->firstOrFail();
        $input =  $request->except('password', 'password_confirmation');
        $file_name = "";
        if($file = $request->file('image') )
        {   if($user->picture_id !=1){
            $file_delete=Picture::findOrfail($user->picture->id);
            $file_delete->forceDelete();
            unlink(public_path()."/". $file_delete->file);
             }

            $file_name=time().$file->getClientOriginalName();
            $file->move('asset/images', $file_name );
            $photo = Picture::create(['file'=> $file_name]);
            $input['picture_id']=$photo->id;

        }

       if(! $request->filled('password'))
       {
           $user->fill($input)->update();
           return back()->with('success', 'Profile updated successfully');
       }
       $user->password=bcrypt($request->password);
       $user->fill($input)->update();
       return back()->with('success', 'Profile updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
