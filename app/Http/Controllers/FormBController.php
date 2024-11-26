<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormBController extends Controller
{
    public function index()
    {   
       // dd('test');
        return view('formb');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'union_name' => 'required|string|max:255',
            'registered_address' => 'required|string',
            'meeting_date' => 'required|date',
            'branch' => 'required',
            'union_type' => 'required',
            'sector' => 'required',
            'industry' => 'required|string',
            'member_count' => 'required|integer|min:1',
            'application_date' => 'required|date',
            'meeting_type' => 'required|string|max:255',
            'secretary_name' => 'required|string|max:255',
        ]);

        // Process the data or save it to the database
        // Example:
        // FormData::create($request->all());
        FormB::create($request->all());

        return redirect()->route('formb.index')->with('success', 'Form submitted successfully!');
    }
}