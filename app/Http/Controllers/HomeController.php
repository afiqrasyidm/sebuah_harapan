<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;

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

        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['last_login' => Carbon::now()->toDateTimeString(),
			'login_count' => DB::raw('login_count + 1'),
			
			
			]);
		
		
		
		$posts = DB::table('posts')
			 ->select('posts.id as id','users.name', 'posts.created_at as created_at',
			 'posts.body as body', 'posts.title as title', 'posts.up_vote as up_vote',
			 'posts.down_vote as down_vote'
			 )
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
			 ->orderBy('posts.created_at','DESC')
			 
            ->paginate(10);
			
		$comments = DB::table('comments')
		
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
			->orderBy('comments.created_at','DESC')
            ->get();
		
//		return $posts;

//        return response()->json($Comments, 201);

        return view('belimbing/home')->with('posts',$posts)->with('comments',$comments);
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
