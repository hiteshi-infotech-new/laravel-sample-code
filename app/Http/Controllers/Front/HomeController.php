<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AdminModel\Product;
use App\AdminModel\Brand;

class HomeController extends Controller
{
    public function index()
    {
        $where1=array('is_feature'=>'1','delete_flag'=>'0');
        $homedata['featured']=Product::where($where1)
                            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                            ->select('products.*','categories.name as category_name')->get();
        $where2=array('delete_flag'=>'0');
        $homedata['New_Arraival']=Product::where($where2)->latest()->limit('4')
                            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
                            ->select('products.*','categories.name as category_name')->get();
        $homedata['Brand']=Brand::where($where2)->latest()->limit('6')->get();
        
        return view('front.welcome',compact('homedata'));
    }
}
