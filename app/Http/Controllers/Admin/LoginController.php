<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    protected $guard = 'admin';
    protected $redirectTo = '/admin/';

    protected function guard()
    {
    return Auth::guard($this->guard);
    }

    public function register()
    {
        return view('admin/register');
    }
  
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();
  
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
  
        return redirect()->route('login');
    }
  
    public function login()
    {
        return view('admin/login');
    }
  
    public function loginAction(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /*(!Auth::attempt($request->only('email', 'password'), $request->boolean('remember')))
        keno guno guard(admin) xleh supo atas sbb tu default guard users. 
        Attempt to authenticate against the "admin" guard*/
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // Authentication succeeded
    
            //Regenerate session
            $request->session()->regenerate();
    
            //Redirect to dashboard
            return redirect()->route('dashboard.staff');
            
           //dd('Authentication succeeded', Auth::guard('admin')->user());
        } else {
            // Authentication failed
            dd('Authentication failed', $request->all());
        }
    }
    
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
 
    public function profile()
    {
        return view('profile');
    }

    public function updateProfile(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Find the admin user by ID
        $admin = Admin::find($id);

        // Update the admin's profile
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        // Save the changes
        $admin->save();

        // Redirect back with success message
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
    }
}
