<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\DB;
class PublicController extends Controller
{
   
    public function index()
    {

         
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

//        return response()->json($Comments, 201);

        return view('belimbing/home')->with('posts',$posts)->with('comments',$comments);
    }



    public function allUser()
    {

		$users = DB::table('users')->orderBy('created_at','DESC')->get();;

		$total = DB::table('users')->count();
			
		return view('belimbing/all-user')->with('users', $users)->with('total', $total);
    }    
	
	 


}
