<?php

namespace App\UserModel;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Address extends Model
{
 
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $guarded =[];
    protected $fillable = [
 		'user_id','address','country','id'
    ];

    public function getStatusAttribute($value)//Accessor
    {
    	if($value=='1')
        return ucfirst('Active');
    	else
        return ucfirst('Deactive');
    }

    // public function setUserIdAttribute($value)//Mutator
    // {
    //     $this->attributes['user_id'] = 1;
    // }


    
}
