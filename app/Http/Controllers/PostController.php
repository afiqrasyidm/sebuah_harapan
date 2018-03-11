<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;

use Auth;
use App;

class PostController extends Controller
{
	
    public function index()
    {

			
        return Post::all();
    }

    public function show($id)
    {
		
		
		$post = DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
			 ->where('posts.id', '=', $id)
            ->first();
		
		$comments = DB::table('comments')
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
			->orderBy('comments.created_at','DESC')
			 ->where('comments.post_id', '=', $id)
            ->get();
	
		if($post == NULL){
			abort(404);
		}
	//return $comments ;
		
	//	return $post;
    
        return view('belimbing/single-post')->with('post',$post)->with('comments',$comments);
    }
	
	 public function comment_post($id)
    {
		
		if(!Auth::check()){
			
			return redirect()->route('login');
		
		}

		
     	
		$comment = new Comment;
		$comment->body = Input::get('body');
		$comment->user_id = Auth::user()->id;
		$comment->post_id = $id;
		$comment->up_vote = 0;
		$comment->down_vote = 0;
		
		$comment->save();
		
		return redirect()->route('show.single.post', ['id' => $id]);
		
    }
	
	
	public function ask()
    {
	
	


        return view('belimbing/ask-post');
    }
	
	public function ask_post()
    {
	
			$post = new Post;
			$post->title = Input::get('title');
			$post->user_id = Auth::user()->id;
			$post->post_category = 0;
			$post->body = Input::get('body');
			
			$post->up_vote = 0;
			$post->down_vote = 0;
		
		
			$post->save();
			
            return redirect()->route('home');
	
    }
	
	
	
    public function show_post_uid()
	
	{

	
		
		
	 
		$posts = DB::table('posts')
			 ->select('posts.id as id','users.name', 'posts.created_at as created_at',
			 'posts.body as body', 'posts.title as title', 'posts.up_vote as up_vote',
			 'posts.down_vote as down_vote'
			 )
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
			 ->where('users.id', '=', Auth::user()->id)
			 ->orderBy('posts.created_at','DESC')->paginate(10);
			 

			
		$comments = DB::table('comments')
		
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
			->orderBy('comments.created_at','DESC')
            ->get();
		
	
		

		//dd($posts);

		return view('belimbing/home')->with('posts',$posts)->with('comments',$comments);

//		return response()->json($posts, 201);
    }
	

    public function store(Request $request)
    {
		$user_id = Auth::guard('api')->id();
		
		
        $post = Post::create($request->all()+ ['user_id' => $user_id ]);
		
        return response()->json($post, 201);
    }

    public function update(Request $request, Post $post)
    {
	
		$user_id = Auth::guard('api')->id();
		
        $post->update($request->all()) + ['user_id' => $user_id ];

        return response()->json($post, 200);
    }

    public function delete( $post_id)
    {
		
			
		DB::table('posts')->where('id', '=', $post_id)->delete();

        return response()->json(null, 204);
    }
}
