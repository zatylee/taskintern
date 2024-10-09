<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StaffController extends Controller
{

    public function create()
    {
        return view('staff.addstaff');
    }

    //store newly created resource
    public function store(Request $request)
    {
        Staff::create($request->all());

        return redirect()->route('dashboard.viewstaff')->with('success', 'New Staff has been added successfully.');
    
    }

    //display specified resource
    public function showStaff()
    {
        // Retrieve the staff members for the table
        $staff = Staff::orderBy('id', 'asc')->simplePaginate(5);
    
        return view('staff.showstaff', ['staff' => $staff]);
    }
    

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'department' => 'required',
            'phoneNo' => 'required',
        ]);
    
        // Find the staff member by ID
        $staff = Staff::findOrFail($id);
    
        // Update the staff member with the new data
        $staff->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'department' => $request->input('department'),
            'phoneNo' => $request->input('phoneNo'),
        ]);
    
        // Redirect back to the viewstaff route with a success message
        return redirect()->route('dashboard.viewstaff')->with('success', 'Staff has been updated successfully');
    }
    
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('dashboard.viewstaff')->with('success', 'Staff has been deleted successfully');
    }

    public function totalStaff()
    {
        // Get the total number of staff members
        $totalStaff = Staff::count();

        // Get the total number of staff dale App
        $totalStaffInApps = Staff::where('department', 'Application')->count();

        // Get the total number of staff dale DB
        $totalStaffInDB = Staff::where('department', 'Database')->count();

        // Get the total number of staff dale Infra
        $totalStaffInInfra = Staff::where('department', 'Infra')->count();

        // Pass both variables to the view
        return view('dashboard', ['totalStaff' => $totalStaff, 'totalStaffInApps' => $totalStaffInApps, 'totalStaffInDB' => $totalStaffInDB,
        'totalStaffInInfra' => $totalStaffInInfra]);
    }
}
