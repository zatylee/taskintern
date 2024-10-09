<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Invite;
use App\Models\Contact2;
use App\Mail\ContactMail;
use App\Notifications\InviteNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Notification;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;






class UserController extends Controller
{
   
    public function index()
        {
        $users = Staff::all();
        return view('users.index', ['users' => $users]);
        }
    
    public function index2()
        {
        $users = Staff::all();
        return view('users.index2', ['users' => $users]);
        }

    public function invite_view()
        {
            return view('users.invite');
        }

    public function invite_view2()
        {
            return view('users.invite2');
        }
    
    // public function process_invites(Request $request)
    //     {
    //         $validator = Validator::make($request->all(), [
    //             'email' => 'required|email|unique:users,email'
    //         ]);
    //         $validator->after(function ($validator) use ($request) {
    //             if (Invite::where('email', $request->input('email'))->exists()) {
    //                 $validator->errors()->add('email', 'There exists an invite with this email!');
    //             }
    //         });
    //         if ($validator->fails()) {
    //             return redirect(route('invite_view'))
    //                 ->withErrors($validator)
    //                 ->withInput();
    //         }
    //         do {
    //             $token = Str::random(20);
    //         } while (Invite::where('token', $token)->first());
    //         Invite::create([
    //             'token' => $token,
    //             'email' => $request->input('email')
    //         ]);
    //         $url = URL::temporarySignedRoute(
        
    //             'registration', now()->addMinutes(300), ['token' => $token]
    //         );

    //         Notification::route('mail', $request->input('email'))->notify(new InviteNotification($url));
    //         return redirect('/users')->with('success', 'The Invite has been sent successfully');
    //     }

    // public function registration_view($token)
    // {
    //     $invite = Invite::where('token', $token)->first();
    //     return view('auth.register',['invite' => $invite]);
    // }
    public function process(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('invites', 'email')->where(function ($query) {
                    return $query->whereNotIn('email', Staff::pluck('email')->toArray());
                }),
                Rule::unique('staff', 'email')->where(function ($query) {
                    return $query->whereNotIn('email', Invite::pluck('email')->toArray());
                })
            ]
        ], [
            'email.unique' => 'The email is already registered in the system.'
        ]);

        // Generate a unique token
        do {
            $token = Str::random();
        } while (Invite::where('token', $token)->exists());

        // Create a new invite record
        $invite = Invite::create([
            'email' => $request->get('email'),
            'token' => $token
        ]);

        // Send the email
        Mail::to($request->get('email'))->send(new InviteCreated($invite));

        // Set a success flash message
        session()->flash('success', 'Invitation sent successfully.');

        // Redirect back to the previous page
        return redirect()->back();
    }

    public function process2(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('contacts2', 'email')->where(function ($query) {
                    return $query->whereNotIn('email', Staff::pluck('email')->toArray());
                }),
                Rule::unique('staff', 'email')->where(function ($query) {
                    return $query->whereNotIn('email', Invite::pluck('email')->toArray());
                })
            ],
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ], [
            'email.unique' => 'The email is already registered in the system.'
        ]);
    
        // Create a new contact message instance
        $contact = Contact2::create($request->only(['email', 'name', 'subject', 'message']));
    
        // Send the email
        Mail::to($request->get('email'))->send(new ContactMail($contact));
    
        // Redirect back with a success message
        return redirect()->back()->with(['success' => 'Email sent.']);
    }


    public function accept($token)
    {
        // Look up the invite
        if (!$invite = Invite::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }
    
        // create the user with the details from the invite
        User::create(['email' => $invite->email]);
    
        // delete the invite so it can't be used again
        $invite->delete();
    
        return 'Good job! Invite accepted!';
    }
        
}
