<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::with('Company')->orderBy('created_at', 'DESC')->get();
        $companies = Company::get();

        return view('home', compact('contacts', 'companies'));
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
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $contact = new Contact;
        $this->validate($request, [
            'fname'         => 'nullable|string',
            'lname'         => 'nullable|string',
            'phone_number'  => 'nullable|numeric',
            'email'         => 'nullable|email',
            'company_id'    => 'nullable|numeric',
            'address'       => 'nullable|string'
        ]);


        $contact->fill($request->all())->save();

        return redirect()->back()->with('message', 'Contact Added');
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
        $contact = Contact::findOrFail($id);
        $companies = Company::get();

        return view('edit-contact', compact('contact', 'companies'));
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
        $contact = Contact::findOrFail($id);

        $this->validate($request, [
            'fname'         => 'nullable|string',
            'lname'         => 'nullable|string',
            'phone_number'  => 'nullable|numeric',
            'email'         => 'nullable|email',
            'company_id'    => 'nullable|numeric',
            'address'       => 'nullable|string'
        ]);


        $contact->fill($request->all())->save();

        return redirect('/')->with('message', 'Contact Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->back()->with('message', 'Contact Removed');
    }
}
