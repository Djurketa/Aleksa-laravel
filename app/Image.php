<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Images;
class Image extends Model
{
	
	protected $fillable = [ 'name' ];
	

	public function article()
	{
		
		return $this->belongsTo(Article::class);
		
	}


	public static function storeImages($article)
	{
		
		$images = request()->file('images');
        // Saveing images
		foreach($images as $image)
		{    

			$name=time().$image->getClientOriginalName();
			// intervention facede
			$img = Images::make($image);
			
			$imgPath = public_path().'/article-images/';
			
			$img->resize(null,500, function ($constraint) {
				$constraint->aspectRatio();
			});
			
			$img->save($imgPath.$name);
			// Image model
			$article->images()->create(['name'=>$name]);
		}  
	}



	public static function destroyImages($article)
	{
		
		$images = request("destroy_images");
		
		foreach ($images as $image) {

			$image = json_decode($image);
			
			if($image->article_id == $article->id){

				unlink(public_path() .'/article-images/'. $image->name);

				Image::destroy($image->id);
			}
		}
	}

}

