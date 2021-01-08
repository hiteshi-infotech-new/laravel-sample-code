<?php
   
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\AdminModel\Product;
use App\AdminModel\Category;
use Illuminate\Http\Request;
use Redirect,Response,DB;
use File;
use PDF;

   
class ProductController extends Controller
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
        $category=Category::latest()->get();
        if(request()->ajax()) {
            return datatables()->of(Product::select('*')->where('delete_flag',0))
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-product" id="edit-product">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm delete-product" id="delete-product">Delete</a>';
                 return $btn;
         })->addColumn('image', function($row){
            if(file_exists(public_path().'/product/'.$row->image))
            $url= asset('product/'.$row->image);
             else
            $url= "https://via.placeholder.com/150";
            return '<img id="preview" src="'.$url.'" alt="Preview" class="form-group" width="100" height="100">';
         })
            // ->addColumn('$image', 'append.datatblimage')//view name is datatblimage which is located within append folder
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
        }
         return view('admin.product.productAjax',compact('category'));
    } 
 
    /**
     * Show the resource.
     *
     */
    public function store(Request $request)
    {         
        request()->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
 
        $productId = $request->product_id;
        if($request->is_feature=='1')
        {
            $feature=1;
        }else{
            $feature=0;
        }
 
        $details = ['title' => $request->title,'is_feature' => $feature,'category_id' => $request->category_id,'product_code' => $request->product_code,'price'=>$request->price, 'description' => $request->description];
 
        if ($files = $request->file('image')) {
            
           //delete old file
           \File::delete('public/product/'.$request->hidden_image);
         
           //insert new file
           $destinationPath = 'public/product/'; // upload path
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
           $details['image'] = "$profileImage";
        }
         
        $product   =   Product::updateOrCreate(['id' => $productId], $details);  
               
        return Response::json($product);
    } 
 
    /**
     * Update the resource.
     *
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $product  = Product::where($where)->first();
      
        return Response::json($product);
    }
    public function destroy($id) 
    {
        $data = Product::where('id',$id)->first(['image']);
        \File::delete('public/product/'.$data->image);
        $array=['delete_flag'=>1];
        $product = Product::where('id',$id)->update($array);
        return Response::json($product);
    }
}