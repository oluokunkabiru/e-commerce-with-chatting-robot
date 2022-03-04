<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vendors = Vendor::orderBy('id', 'desc')->get();
        return view('admin.become-a-vendor', compact(['vendors']));

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
        ]);
        $service = new Vendor();

        $service->topic = $request->title;
        // $service->slug = strtolower(str_replace(" ", '_', $request->title.'_'. time())); ;
        $service->user_id = Auth::user()->id;
        $service->description = $request->description;
        $service->save();
        return redirect()->back()->with('success', "New Instructions add successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $service = Vendor::where('id', $id)->first();
        $service->topic = $request->title;
        $service->user_id = Auth::user()->id;

        $service->description = $request->description;
        $service->update();
        return redirect()->back()->with('success', "Instruction updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $service = Vendor::where('id', $id)->first();
        $service->forceDelete();
        return redirect()->back()->with('success', "Instructions deleted successfully");

    }
}
