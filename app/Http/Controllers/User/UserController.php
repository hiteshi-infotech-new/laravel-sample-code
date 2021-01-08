<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\UserModel\User;
use Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:user');// middleware for all .
    }

    /**
     * Update the resource.
     *
     */
    public function uploadAvtar(Request $request) 
    {
        if($request->hasFile('profile'))
        {
        User::uploadAvtar($request->profile);
        return redirect()->back()->with('message','Profile updated successfully!');
        }else{
        return redirect()->back()->with('error','Select image to upload!');
        }
    }

    /**
     * Show the resource.
     *
     */
    public function userDetails()
    {
 
    	return view('profile');
    }

    /**
     * Update the resource.
     *
     */
    public function profile_update(Request $request)
    {
        auth()->user()->update(['name' => $request->name,'email' => $request->email]);
        return redirect()->back()->with('message','Profile updated successfully!');


    }


}
