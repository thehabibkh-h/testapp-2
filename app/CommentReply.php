<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Comment;

class CommentReply extends Model
{
    //

    protected $fillable = [
    	'comment_id','is_active','author','body','email','photo'

    ];

    public function comment(){

        return $this->belongsTo("App\Comment");

    }
}
