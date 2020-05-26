<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;
use App\Photo;
use App\Post;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function role(){
        return $this->belongsTo('App\Role');
    }


    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function setPasswordAttribute($value){

        if(!empty($value)){
            return $this->attributes['password'] = bcrypt($value);
        }

    }

    public function isAdmin(){

        if($this->role->name == 'Administrator'){
            return true;
        }
        
        return false;
        
    }

    public function post(){
        return $this->hasMany('App\Post');
    }

   
}
