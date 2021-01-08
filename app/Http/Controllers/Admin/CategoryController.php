<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Category;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $category=Category::latest()->get();
        return view('admin.category.list',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('storage/category'), $imageName);
        $file = Category::create([
            'name' => $validated['name'],
            'image' => $imageName,
        ]);
        return redirect('Category')->with('message', "Success!");
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Category $Category)
    {
        return view('admin.category.update',compact('Category'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request ,Category $Category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        Storage::delete('/public/storage/category/'.$Category->image);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('storage/category'), $imageName);
        $Category->update(['name'=>$request->name,'image'=>$imageName]);
        return redirect('Category')->with('message', "Updates Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return redirect('Category')->with('message','Category Deletes Successfully');
    }
}
