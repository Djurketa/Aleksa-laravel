<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	
	protected $fillable = [
		
		'title', 'category_id', 'description', 'price', 'condition'
	
	];


	
	public function user()
	{
		
		return $this->belongsTo(User::class);
	
	}

	
	public function category()
	{
		
		return $this->belongsTo(Category::class);
	
	}
	

	public function images()
	{
	
		return $this->hasMany(Image::class);
	
	}
	

	public function comment()
	{
		
		return $this->hasMany(Comment::class);
	
	}

	
}
