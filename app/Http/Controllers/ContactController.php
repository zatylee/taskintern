<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Assuming you have a view named 'staff.contactForm'
        return view('staff.contactForm');
    }
  
    /**
     * Store a newly created contact message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);

        // Create a new contact message instance
        Contact::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with(['success' => 'Thank you for contacting us. We will get back to you shortly.']);
    }
}
