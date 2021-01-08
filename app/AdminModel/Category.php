<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = [
        'id','name','image'
   ];
}
