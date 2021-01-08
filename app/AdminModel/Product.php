<?php
 
namespace App\AdminModel;
 
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
   protected $fillable = ['title','category_id','product_code','price','description','image','is_feature'];
 
}