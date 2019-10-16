<?php

namespace App\Http\Controllers;
use App\Notifications\CommentNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\User;


class CommentsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		
	}

	public function store(Comment $comment, Article $article)
	{

		$data = request()->validate([
			
			'text' => 'required|max:190'
			
		]);
		
		// Add article_id to data
		$data['article_id']=$article->id ;
		
		// Store comment
		auth()->user()->comment()->create($data);		
		
		// Get name for notivication - Who post commnet
		$user_name = auth()->user()->name;
		
		// Send notification to owner of article
		$article->user->notify(	new CommentNotification($user_name,$article->id));

		return redirect()->back();


	}


	public function destroy(Comment $comment)
	{
		
		abort_if(auth()->user()->id != $comment->user_id,403);

		$comment->delete();

		return redirect()->back();

	}
}
