<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAddress;
use App\UserModel\Address;
use App\Http\Controllers\Controller;
use Auth;


class AddressController extends Controller
{   
    public function __construct()
    {
        // $this->middleware('auth')->except('create');// middleware for all function left create.
        // $this->middleware('auth')->only('index');// middleware for only index.
        $this->middleware('auth:user');// middleware for all .
    }
    
    public function index()
    {
    	$id=Auth()->user()->id;
    	// $Address=Address::where('user_id',$id)->get();
        $Address=Address::where('user_id',$id)
                ->leftJoin('countries', 'addresses.country', '=', 'countries.id')
                ->select('addresses.*','countries.name as country_name')->get();
    	// dd($Address);
    	return view('user.address.list')->with('Address',$Address);
    }

    public function create()
    {
    	$country = DB::table('countries')->select('id', 'name as country_name')->get();
    	return view('user.address.create',compact('country'));
    }

    public function store(StoreAddress $request)
    {
		
		Address::create($request->all());
		return redirect('Address')->with('message','Address Created Successfully');

    }
     public function edit(Address $Address)
    {
    	// dd($Address->address);
        $address=$Address;
	    $country = DB::table('countries')->select('id', 'name as country_name')->get();
    	return view('user.address.update',compact('address','country'));//return two data array for view
    }

    public function update(Request $request ,Address $Address)
    {
        // dd($address->country);
        $Address->update(['address'=>$request->address,'country'=>$request->country]);
        return redirect('Address')->with('message','Address Updates Successfully');

    }
    public function destroy(Address $Address)
    {
        // dd($address->country);
        $Address->delete();
        return redirect('Address')->with('message','Address Deletes Successfully');

    }
}
