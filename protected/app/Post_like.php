<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_like extends Model
{
    //
	
	protected $fillable = ['user_id', 'post_id', 'user_id', 'flag_vote' ];
}
