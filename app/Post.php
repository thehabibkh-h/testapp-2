<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Photo;
use App\Comment;

class Post extends Model
{
    //

    protected $fillable = [
        'title','category_id','photo_id','user_id','body'
    ];


    public function user(){

    	return $this->belongsTo("App\User");

    }	

    public function photo(){

    	return $this->belongsTo("App\Photo");

    }	

     public function category(){

        return $this->belongsTo("App\Category");

    }

    public function comment(){

        return $this->hasMany("App\Comment");

    }

}
