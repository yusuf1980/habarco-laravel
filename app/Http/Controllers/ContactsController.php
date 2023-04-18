<?php

namespace App\Http\Controllers;

use Redirect;
use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->paginate(20);
        return view('back.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        if(!$contact){
            return abort(404);
        }
        $contact->status = 0;
        $contact->save();

        return view('back.contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
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
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $name = $contact->name;
        $email = $contact->email;
        if(!$contact){
            return abort(404);
        }
        $contact->delete();

        flash()->warning('Anda telah menghapus Pesan dari '.$name.' ('.$email.')');

        return Redirect::route('contacts.index');
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            's' => 'required|min:2|max:150'
        ]);

        $search = $request->input('s');

        $contacts = Contact::where('name', 'like', '%'.$search.'%')->orWhere('email', 'like', '%'.$search.'%')->paginate(20);

        return view('back.contacts.index', compact('contacts'));
    }
}
