<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Image;
use App\Category;

class FiltersController extends Controller 
{

	public function filter(Request $request , Article $article)
	{
		
		// Querying article
		$query = $article->newQuery();
		// By search string
		$query->where('title', 'LIKE', '%' .$request->string . '%');
		// By category
		if($request->category >= 1){
			
			$query->where('category_id',$request->category);
		}
		// If min price is not provided, asign 0
		$request->min == null ? $request->min = 0 : $request->min;
		// By price limits
		if ($request->min >= 0 && $request->max > 0) {

			$query->whereBetween('price', [$request->min , $request->max]);
			
		}
		// By condition
		if($request->condition == 'new'){
			
			$query->where('condition','novo');
		
		}

		if($request->condition == 'used'){

			$query->where('condition','polovno');
		
		}
		// Sorting result by price or date
		switch ($request->sort) {
			
			case 'lowest':
				$query->orderBy('price','asc');
			break;
			
			case 'highest':
				$query->orderBy('price','desc');
			break;
			
			case 'oldest':
				$query->orderBy('created_at','asc');
			break;	
			
			case 'newest':
				$query->orderBy('created_at','desc');
			break;
		}

		$articles = $query->paginate(24);
		
		$request->flash();
		return view('pages.articles', compact('articles'));

	}
}
