<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactUsRequest;

class ContactUs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $messages = Contact::get();
        $contact = Contact::orderBy('id', 'desc')->paginate(10);
        $read = Contact::where('status', 'read')->get();
        $unread = Contact::where('status', 'unread')->get();

        // return $contact;
        return view('admin.messages', compact(['contact', 'read', 'unread', 'messages']));
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


    public function store(ContactUsRequest $request)
    {
        //
         function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
        $contact = new Contact();
        $contact->email = $request->email;
        $contact->name = $request->name;
        $contact->message = testinput( $request->message);
        $contact->user_id = Auth::user()->id;
        $contact->status = "unread";
        $contact->save();
        return redirect()->back()->with("success", "We have received your message successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $contact = Contact::with(['user', 'picture'])->where('id', $id)->firstOrFail();
        $user = User::with(['picture'])->where('id', $contact->user_id)->firstOrfail();
        // return $contact;
        return view('admin.readmessage', compact(['contact', 'user']));
    }
    public function shows(Request $request)
    {
        //
        $id = $request->view;
        $contact = Contact::with(['user', 'picture'])->where('id', $id)->firstOrFail();
        $user = User::with(['picture'])->where('id', $contact->user_id)->firstOrfail();
        $contact->status = "read";
        $contact->update();

        // return $contact;
        return view('admin.readmessage', compact(['contact', 'user']));
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
