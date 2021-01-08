<?php
   
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\AdminModel\Brand;
use Illuminate\Http\Request;
use Redirect,Response,DB;
use File;
use PDF;

   
class BrandController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the resource.
     *
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Brand::select('*')->where('delete_flag',0))
            ->addColumn('action', function($row){   
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-product" id="edit-product">Edit</a>';

                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-product" id="delete-product">Delete</a>';

                 return $btn;
         })->addColumn('image', function($row){
             if(file_exists(public_path().'/brand/'.$row->image))
            $url= asset('brand/'.$row->image);
             else
            $url= "https://via.placeholder.com/150";
            return '<img id="preview" src="'.$url.'" alt="Preview" class="form-group" width="100" height="100">';
         })
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
        }
         return view('admin.product.brand');
        // return view('list',compact('category'));
    } 
    
    public function store(Request $request)
    {  
       
        request()->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
 
        $brandId = $request->brand_id;
        
        $details = ['name' => $request->name];
 
        if ($files = $request->file('image')) {
            
           //delete old file
           \File::delete('public/brand/'.$request->hidden_image);
         
           //insert new file
           $destinationPath = 'public/brand/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $details['image'] = $profileImage;
        }
         
        $brand   =   Brand::updateOrCreate(['id' => $brandId], $details);  
               
        return Response::json($brand);
    } 
    
    
    /**
     * Update the resource.
     *
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $brand  = Brand::where($where)->first();
      
        return Response::json($brand);
    }

    /**
     * Remove the resource.
     *
     */
    public function destroy($id) 
    {
        $data = Brand::where('id',$id)->first(['image']);
        \File::delete('public/brand/'.$data->image);
        $array=['delete_flag'=>1];
        $brand = Brand::where('id',$id)->update($array);
      
        return Response::json($brand);
    }
}