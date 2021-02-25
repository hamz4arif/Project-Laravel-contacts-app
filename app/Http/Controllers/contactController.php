<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use SweetAlert;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $contacts = contact::where('userID', $id)->orderBy("id", "desc")->paginate(10);
        return view('show', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth()->user()->id;
        $request->validate([
            'name' => 'required',
            "email" => "required",
            "phone" => "required|numeric"
        ]);
        $contact = contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'userID' => $id
        ]);
        if ($contact) {
            return redirect('contacts')->with('contactAdded', "your contact has been added successfully");
        }
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
        $contact = contact::find($id);
        return view('update', ['contact' => $contact]);
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
        // echo $id;exit;
        $contact = contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        if ($contact->save()) {
            return redirect('contacts')->with('contactAdded', "your contact has been Updated successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=contact::find($id);
        
        if($contact->delete()){
            // SweetAlert::message('Robots are working!');
            return redirect('contacts')->with('contactAdded',"your contact has been deleted successfully");
        }
    }
}
