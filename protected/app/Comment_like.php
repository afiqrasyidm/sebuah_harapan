<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment_like extends Model
{
    //
	
		protected $fillable = ['user_id', 'comment_id', 'user_id', 'flag_vote' ];
}
