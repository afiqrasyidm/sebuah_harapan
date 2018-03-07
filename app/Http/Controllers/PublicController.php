<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class PublicController extends Controller
{
   
    public function index()
    {

        $posts = Post::orderBy('up_vote', 'DESC')->paginate(10);
        $users = User::all();

        $comments = Comment ::all();

//        return response()->json($Comments, 201);

        return view('home')->with('posts',$posts)->with('users',$users)->with('comments',$comments);
    }


}
