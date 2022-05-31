<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; //Importing the contact class from the model so we can use it in the contact controller

class ContactController extends Controller
{

    public function __construct()
    {

        //$this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //display all contacts
        $mycontacts = Contact::getContact();
        return view('myadmin.contacts', compact('mycontacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Add Contact";
        return view('myadmin.addcontact', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate user's input
        $validate = $request->validate([

            'phonenumber' => 'required',
            'emailaddress' => 'required|email|unique:contacts',
            'gender' => 'required',
            'meet_at' => 'required',
            'fullname' => 'required',
            'biography' => 'required',
            'shortname' => 'required',
            'contactaddress' => 'required'

        ]);

        //call insert method
        Contact::insertContact($request);

        //redirecting using URI
        return redirect('contacts');

        //set flash session
        /*$request->session()->flash("success", "A new contact was successfully added");

       return redirect('contacts');*/
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
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    }
    public function edit($id)
    {
        //fetch the specific contact
        $details = Contact::getContacts($id);
        //dd($details);
        $title = "Edit Contact";
        return view('myadmin.editcontact', compact('title', 'details', 'id'));
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
        //Validate input
        $validate = $request->validate([

            'phonenumber' => 'required',
            'emailaddress' => 'required|email|unique:contacts,emailaddress,' . $id . ',contact_id',
            'gender' => 'required',
            'meet_at' => 'required',

        ]);

        //update record
        Contact::updateContact($request);
        return redirect('contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        //
        Contact::deleteContact($id);

        return redirect('contacts');
    }
}
