<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Services::orderBy('id', 'desc')->with(['picture'])->get();
        return view('admin.services', compact(['services']));
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
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string|min:40',
            'image' => 'required|image|mimes:png,jpg'
        ]);
        $service = new Services();
        if ($file = $request->file('image')) {
            $file_name = str_replace(" ", "_", $request->title.'_'. time());

            $file->move('asset/images', $file_name);
            $photo = new Picture();
            $photo->file = $file_name;
            $photo->save();
            $service->picture_id = $photo->id;
        }
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();
        return redirect()->back()->with('success', "New Services add successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $service = Services::with(['picture'])->where('id', $id)->first();

        if($file = $request->file('image')){
            $file_delete=Picture::findOrfail($service->picture->id);
            $file_delete->forceDelete();
            unlink(public_path()."/". $file_delete->file);
            $file_name = str_replace(" ", "_", $request->title.'_'. time());

            $file->move('asset/images', $file_name);
            $photo = new Picture();
            $photo->file = $file_name;
            $photo->save();
            $service->picture_id = $photo->id;
        }
        $service->title = $request->title;
        $service->description = $request->description;
        $service->update();
        return redirect()->back()->with('success', "Services updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $service = Services::with(['picture'])->where('id', $id)->first();
        $file_delete=Picture::findOrfail($service->picture->id);
        $file_delete->forceDelete();
        unlink(public_path()."/". $file_delete->file);
        $service->forceDelete();
        return redirect()->back()->with('success', "Services deleted successfully");

    }
}
