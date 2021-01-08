<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserModel\User;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the profile.
     *
     */
    public function profile()
    {
        return view('admin.profile');
    }

    /**
     * Update the profile.
     *
     */
    public function profileUpdate(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'            
        ]);

        auth()->user()->update(['name' => $request->name,'email' => $request->email]);
        return redirect('/admin/profile')->with('message','Profile updated successfully!');
    }    
}
