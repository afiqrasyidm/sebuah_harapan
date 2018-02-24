<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Comment;

use Auth;
use App;

class CommentController extends Controller
{
   public function index()
    {

			
        return Comment::all();
    }

    public function show($id)
    {
		
        return Comment::find($id);
    }
	public function show_comment_pid($post_id)
	
	{

		$Comments = Comment ::where('post_id', $post_id )->get();
        
		return response()->json($Comments, 201);
    }
	

    public function store(Request $request)
    {
		$user_id = Auth::guard('api')->id();
		
		
        $Comment = Comment::create($request->all()+ ['user_id' => $user_id ]);
		
        return response()->json($Comment, 201);
    }

    public function update(Request $request, Comment $Comment)
    {
	
		$user_id = Auth::guard('api')->id();
		
        $Comment->update($request->all()) + ['user_id' => $user_id ];

        return response()->json($Comment, 200);
    }

    public function delete( $comment_id)
    {
		
			
        DB::table('comments')->where('id', '=', $comment_id)->delete();

      

        return response()->json(null, 204);
    }
}
