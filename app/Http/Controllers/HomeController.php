<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::orderBy('up_vote', 'DESC')->paginate(10);
        $users = User::all();

        $comments = Comment ::all();

//        return response()->json($Comments, 201);

        return view('belimbing/home')->with('posts',$posts)->with('users',$users)->with('comments',$comments);
    }

    public function test()
    {

        $posts = Post::all();
        $users = User::all();

        $comments = Comment ::all();

//        return response()->json($Comments, 201);

        return view('belimbing/test')->with('posts',$posts)->with('users',$users)->with('comments',$comments);
    }
}
