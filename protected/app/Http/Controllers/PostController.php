<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Post_like;
use App\Comment_like;

use Auth;
use App;
use Mail;

class PostController extends Controller
{
	
    public function index()
    {

			
        return Post::all();
    }

    public function show($id)
    {
	
		//kalau belum login di counter id == -1, supaya g error
		$user_id_login = -1;
		if(Auth::check()){
					
					$user_id_login = Auth::user()->id ;
				

		}
	
	///
		///Query untuk handle posts
	////
	

		
		$post = DB::table('posts')
		
			->select('posts.id as id','users.id as user_id','users.name', 'posts.created_at as created_at',
			 'posts.body as body', 'posts.title as title', 'posts.up_vote as up_vote',
			 'posts.down_vote as down_vote', 'flag_vote as flag_user_vote_login',
			 
			 DB::raw("(SELECT count(*) FROM post_likes
                          WHERE posts.id = post_likes.post_id 
                        ) as post_likes_count"),
			
			DB::raw("(SELECT count(*) FROM comments
                          WHERE comments.post_id = '$id' 
                        ) as comments_count")
						
						
				
			 )
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
            ->leftJoin(DB::raw("(SELECT *  FROM post_likes
							WHERE post_likes.user_id = '$user_id_login'
								AND post_likes.post_id = '$id'
							) pl"),'pl.user_id' , '=', 'posts.user_id')

			->where('posts.id', '=', $id)
            ->first();
		//post id tidak ada di dalam db
	//	dd($post);
		if($post == NULL){
			
			abort(404);
		}

		
				
				
		//dd($post);
		
		

	///
		///Query untuk handle comment
	////
	

		
		
		$comments = DB::table('comments')
			->select('comments.id as id','users.id as user_id', 'comments.body as body',  'comments.is_anonim', 
				'users.name as name', 'comments.created_at as created_at' , 'flag_vote as flag_user_vote_login',
				DB::raw("(SELECT count(*) FROM comment_likes
                          WHERE comments.id = comment_likes.comment_id 
                        ) as comments_likes_count")
				
			 )
		
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
			 ->leftJoin(DB::raw("(SELECT *  FROM comment_likes
							WHERE comment_likes.user_id = '$user_id_login'
							) cl"),'cl.comment_id' , '=', 'comments.id')
			->orderBy('comments_likes_count','comments.created_at','DESC')
			 ->where('comments.post_id', '=', $id)
            ->get();
			
			
	
//		return $post_likes_flag_user;
		

	//return $comments ;
		
//dd($comments);
    
        return view('belimbing/single-post')->with('post',$post)
		->with('comments',$comments)
		;
	}
	
	 public function comment_post($id)
    {	
		
		//untuk submit comment
		if(Input::get('comment')){
			
			
			$comment = new Comment;
			
			if(!Auth::check()){
				//hardcode anonim user
				$comment->user_id = 27;
				$comment->is_anonim = 0;
			}

			else{
				//kalau udah login di cek apakah dia milih anonim apa nama dia sendiri			
				
				$comment->user_id = Auth::user()->id;
				$comment->is_anonim =   Input::get('is_anonim');
				
			}
			$comment->body = Input::get('body');
			$comment->post_id = $id;
			$comment->up_vote = 0;
			$comment->down_vote = 0;
			
			$comment->save();
			
			
			
			
			
			$post = DB::table('posts')
            ->leftJoin('users', 'users.id', '=', 'posts.user_id')
			 ->where('posts.id', '=', $id)
            ->first();
			
			//dd($post);

			
			
			 $data = array('post_title'=> $post->title,
							'post_creator'=> $post->name,
							'post_crea_email'=> $post->email,
							'post_id'=> $id
						);
			
			//dd($data['post_crea_email']);
			
			 // $message = "asdasdasd";
			  Mail::send('belimbing/mail', $data, function($message) use ($data) {
				 $message->to($data['post_crea_email'], $data['post_creator'])->subject
					('Pertanyaan Kamu Telah Dijawab!');
				 $message->from('xyz@gmail.com','Belimbing');
			  });
		  
			
			
			return redirect()->route('show.single.post', ['id' => $id]);
		}
		//hapus post
		else if(Input::get('hapus')){
			$post = Post::find($id);
			$post->delete();
			
			return redirect()->route('home');
		}
		//edit post
		//masuk ke text editor
		else if(Input::get('ubah')){
			
			
			
			$post = DB::table('posts')
			 ->select('posts.id as id','users.name', 'posts.created_at as created_at',
			 'posts.body as body', 'posts.title as title', 'posts.up_vote as up_vote',
			 'posts.down_vote as down_vote'
			 )
            ->leftJoin('users', 'posts.user_id', '=', 'users.id')
			 ->where('users.id', '=', Auth::user()->id)
			 ->where('posts.id', '=', $id)
			  ->first();
			
			
			
			
			return view('belimbing/ubah-post')->with('post',$post);
		
		}
		//untuk final setelah ubah post dari text editor
		else if(Input::get('ubah_final')){
			
			
			
			$post = Post::find($id);
			$post->title = Input::get('title');

			$post->body = Input::get('body');

			$post->save();
			
			
				//return "lol";
			
			
			
			return redirect()->route('show.single.post', ['id' => $id]);
		}
		
		//hapus comment
		else if(Input::get('hapus_comment')){
			
			//return Input::get('hapus_comment');
			$comment = Comment::find(Input::get('hapus_comment'));
			$comment->delete();
			
			return redirect()->route('show.single.post', ['id' => $id]);
		}
		
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
			
		if(Input::get('body')!=NULL)	
			$post->body = Input::get('body');
		else
			$post->body =" ";
		
			$post->up_vote = 0;
			$post->down_vote = 0;
		
		
			$post->save();
		
			
       	
				return redirect()->route('show.single.post', ['id' => $post->id]);
		
	
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
			 

		//return "asda";
	
		

		//dd($posts);

		return view('belimbing/myquestion')->with('posts',$posts);

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
	public function up_vote(Request $request)
    {
		
	
	  if($request->action == 1){
		$post_like = new Post_like;
		$post_like->user_id =Auth::user()->id;
		$post_like->post_id = $request->post_id;
		$post_like->flag_vote = 1;
		$post_like->save();
	  }
	  else{
		  $post_like = Post_like::where('user_id', Auth::user()->id)
						->where('post_id', $request->post_id)
						->delete();
	  }
		
		
		$post_likes_count = DB::table('post_likes')
			 ->where('post_likes.post_id', '=', $request->post_id)
			 ->where('flag_vote', '=',1)
			 ->count();
			 
			 
        $response = array(
			'status' => "saved" ,
			'msg'    => 'Setting created successfully',
			'post_likes_count' =>$post_likes_count,
		);

		return  \Response::json($response);
    }
	public function up_vote_comment(Request $request)
    {
		
	
	  if($request->action == 1){
		$comment_like = new Comment_like;
		$comment_like->user_id =Auth::user()->id;
		$comment_like->comment_id = $request->comment_id;
		$comment_like->flag_vote = 1;
		$comment_like->save();
	  }
	  else{
		  $comment_like = Comment_like::where('user_id', Auth::user()->id)
						->where('comment_id', $request->comment_id)
						->delete();
	  }
		
		
		$comment_likes_count = DB::table('comment_likes')
			 ->where('comment_likes.comment_id', '=', $request->comment_id)
			 ->where('flag_vote', '=',1)
			 ->count();
			 
			 
        $response = array(
			'status' => "saved" ,
			'msg'    => 'Setting created successfully',
			'comment_likes_count' =>$comment_likes_count,
		);

		return  \Response::json($response);
    }
	
	public function basic_email(){
		//return "asd";
      $data = array('name'=>"Virat Gandhi");
	 // $message = "asdasdasd";
      Mail::send('belimbing/mail', $data, function($message) {
         $message->to('afiqrasyidm@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      return "Basic Email Sent. Check your inbox.";
   }
	
	
	
	
	
	
	
}
