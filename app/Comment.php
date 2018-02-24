<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
      protected $fillable = [ 'body', 'user_id', 'post_id' , 'up_vote', 'down_vote'];
}
