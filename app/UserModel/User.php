<?php

namespace App\UserModel;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function uploadAvtar($image)
    {

        $file_name=$image->getClientOriginalName();
        (new self())->deleteProfile();
        $image->move(public_path('storage/images'), $file_name);
        auth()->user()->update(['profile' => $file_name]);
    }

    protected function deleteProfile()
    {
        if($this->profile)
        {
            Storage::delete('/public/images/'.$this->profile);
        }
    }

    public function identities() {
        return $this->hasMany('App\SocialIdentity');
     }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

}
