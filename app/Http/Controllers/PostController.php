<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Post;

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
		
        return Post::find($id);
    }
	public function show_post_uid()
	
	{

		$user_id = Auth::guard('api')->id();
		
		$posts = Post ::where('user_id', $user_id )->get();

		dd($posts);

		return view('belimbing/home')->with('posts',$posts);

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
