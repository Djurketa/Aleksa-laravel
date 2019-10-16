<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class PagesController extends Controller
{
	public function home()
	{

		$articles = Article::orderBy('created_at', 'desc')->paginate(24);
		
		return view('pages.home',compact('articles'));

	}


	public function article($id)
	{
		
		$article = Article::findOrfail($id);

		return view('pages.article',compact('article'));

	}

	
	public function categories($id)
	{

		if($id=='all'){

			$categories = Category::get();

			return view('pages.categories',compact('categories'));

		}

		$articles = Article::where('category_id','=',$id)->paginate(24);

		return view('pages.articles',compact('articles'));

	}

	
	public function contact()
	{

		return view('pages.contact');

	}
}
