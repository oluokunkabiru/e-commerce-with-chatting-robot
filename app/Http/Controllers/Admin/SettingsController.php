<?php

namespace App\Http\Controllers\Admin;

use App\Models\Picture;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use Intervention\Image\Facades\Image;
use App\Http\Requests\SettingsRequest;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Setting::with(['picture'])->where('id', 1)->firstOrFail();
        // return $setting;
        return view('admin.settings', compact(['setting']));
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
    public function update(SettingsRequest $request, $id)
    {
        //
        $setting = Setting::with(['picture'])->where('id', $id)->firstOrFail();
        $setting->supportemail = $request->supportemail;
        $setting->phone = $request->phone;
        $setting->shipping = $request->shipping;
        $setting->facebook = $request->facebook;
        $setting->instagram = $request->instagram;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;
        $setting->company =ucwords($request->company);
        // $logo = "";
        if($request->file('logo')){
            $file_delete=Picture::findOrfail($setting->picture_id);
            $file_delete->forceDelete();
            unlink(public_path()."/". $file_delete->file);

            $files= $request->file('logo');
             $file = Image::make($files);
            //  $wpath = public_path().'/asset/design/';
             $imagepath = public_path().'/asset/images/';


        $file->resize(120,50);

        $file->save($imagepath.time()."_".$files->getClientOriginalName());

        $file = time()."_".$files->getClientOriginalName();
        // return $fil;

         $logo = new Picture();
         $logo->file = $file;
         $logo->save();
         $setting->picture_id = $logo->id;

         }

         $setting->update();
         return redirect()->back()->with('success', 'Settings Updated Successfully');
    }
     public function about(AboutRequest $request)
     {
        $setting = Setting::with(['picture'])->where('id', 1)->firstOrFail();
        $setting->about = ucwords($request->about);
        $setting->address =ucwords($request->address);
        $setting->update();
        return redirect()->back()->with('success', 'Settings Updated Successfully');


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
