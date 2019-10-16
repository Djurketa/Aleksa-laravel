<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Image;
use App\Category;

class ArticlesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{   
		// Get articles for current user
		$articles = auth()->user()->article()->paginate(12);

		return view('articles.index', compact('articles'));

	}


	public function show(Article $article)
	{
		// get single article for current user
		return view('articles.show',compact('article'));

	}


	public function create()
	{

		$categories = Category::get();

		return view('articles.create',compact('categories'));
	}


	public function store(Article $article)
	{
		
		// Validate request
		$data = $this->validateRequestData();

        // Insert data in article table and get id 
		$article = auth()->user()->article()->create($data);

        // Checking for images
		if (request()->hasfile('images'))
		{   
			// handle images
			Image::storeImages($article);  

		}  

		return redirect("articles/$article->id")->with('success','Uspjesno ste kreirali oglas');	
	}



	public function edit(Article $article)
	{

		$this->authorize('update',$article);

		$categories = Category::get();

		return view('articles.edit',compact('article','categories'));
	}


	public function update(Article $article)
	{
		// Authorize user
		$this->authorize('update',$article);
		// Validate request
		$data = $this->validateRequestData();
		// Update article
		$article->update($data);
		// Check for new images
		if (request()->hasfile('images'))
		{   
			// Store new images for current article
			Image::storeImages($article);   

		}  
		// Check if there is images to destroy
		if(request()->has('destroy_images')){
			// Destroy old images
			Image::destroyImages($article);
		}

		return redirect("articles/$article->id")->with('success','Uspjesno ste izmjenili oglas');
	}


	public function destroy(Article $article)
	{

		$this->authorize('update',$article);

		$article->delete();

		return redirect(route('articles.index'));
	}


    // ------------ Helpers ---------------//


	private function validateRequestData(){
		// Validates request for store and update method
		return request()->validate([
			'title' => 'required',
			'description' => 'required',
			'category_id' =>'required|integer',
			'price' => 'integer',
			'condition' => 'required|in:"novo","polovno"',
			'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000'
		]);
	}
}
