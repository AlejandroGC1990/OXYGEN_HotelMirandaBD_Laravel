<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("contact.index",['contacts' => Contact::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contact.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'string'],
            "phone" => ['required', 'string'],
            "email" => ['required', 'string'],
            "subject" => ['required', 'string'],
            "text" => ['required', 'string'],
        ]);

        Contact::create([
           "name" => $request->input('name'), 
           "phone" => $request->input('phone'), 
           "email" => $request->input('email'), 
           "subject" => $request->input('subject'), 
           "text" => $request->input('text'), 
           "read" => false,
        ]);

        return redirect()->route('contact.index')->with('success', 'Contact Creado Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("contact.show", ["contact" => Contact::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("contact.edit", ["contact" => Contact::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            "name" => ['required', 'string'],
            "phone" => ['required', 'string'],
            "email" => ['required', 'string'],
            "subject" => ['required', 'string'],
            "text" => ['required', 'string'],
        ]);

        $contact->update([
            "name" => $request->input('name'), 
            "phone" => $request->input('phone'), 
            "email" => $request->input('email'), 
            "subject" => $request->input('subject'), 
            "text" => $request->input('text'), 
            "read" => false,
         ]);

         return redirect()->route('contact.show',$contact->id)->with('success','Contact Editado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()->route('contact.index')->with('success','Contact Borrado Correctamente');
    }
}