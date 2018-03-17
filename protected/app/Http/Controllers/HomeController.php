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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	
		if(Auth::check()){
					//user retentiton rate
					DB::table('users')
						->where('id', Auth::user()->id)
						->update(['last_login' => Carbon::now()->toDateTimeString(),
						'login_count' => DB::raw('login_count + 1'),
					
					
					]);
				
			}

	
		
		
		$posts = DB::table('posts')
			 ->select('posts.id as id','users.name', 'posts.created_at as created_at',
			 'posts.body as body', 'posts.title as title', 'posts.up_vote as up_vote',
			 'posts.down_vote as down_vote',  
			
			DB::raw("(SELECT body FROM comments
                          WHERE comments.post_id = posts.id ORDER BY comments.created_at DESC LIMIT 1
                        ) as comments_body"),
			 
			 DB::raw('count(post_likes.id) as count_like'))
			
             ->leftJoin('users', 'posts.user_id', '=', 'users.id')
			 ->leftJoin('post_likes', 'post_likes.post_id', '=', 'posts.id')
			 
			 

			   
			 ->groupBy('posts.id' )
			 ->orderBy('posts.created_at', 'comments.created_at','DESC')
			 
            ->paginate(10);
			
		
		//dd($posts);	

//        return response()->json($Comments, 201);
//        $posts = Post::all();
      //  $users = User::all();
//        $comments = Comment ::all();
//        return response()->json($Comments, 201);
        
        return view('belimbing/home')->with('posts',$posts);

//        return view('belimbing/home')->with('posts',$posts)->with('comments',$comments);
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
