@extends('main')
@section('content')
<h1>Izmjenite Artikal : {{ $article->title }}</h1>
<div class="create-container">

	<form method="post" action="{{ route('articles.update',$article->id) }}" enctype="multipart/form-data">
		{!! method_field('PUT') !!}
		@csrf
		<div class="item">
			<p>Naziv Artikla<span class="required">*</span></p>
			<div class="name-item">
				<input type="text" name="title" value="{{ $article->title }}"  required/>
			</div>
		</div>
		<div class="item">
			<p>Cijena Artikla<span class="required">*</span></p>
			<div class="name-item">
				<input type="number" name="price" value="{{ $article->price }}" required/>
			</div>
		</div>
		<div class="position-item">
			<div class="item">
				<p>Odaberite kategoriju<span class="required">*</span></p>
				<select name="category_id" required >
					@foreach ($categories as $category)
					<option {{ $article->category_id == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="question">
			<p>Selektujte stanje</p>
			<div class="question-answer">
				<div>
					<input {{ $article->condition == 'novo' ? 'checked' : ''}} type="radio"  value="novo" id="radio_5" name="condition" />
					<label for="radio_5"  class="radio"><span>Novo</span></label>
				</div>
				<div>
					<input {{ $article->condition == 'polovno' ? 'checked' : ''}} type="radio"  value="polovno" id="radio_6" name="condition" />
					<label for="radio_6" class="radio"><span>Koristeno</span></label>
				</div>
			</div>
		</div>
		<div class="item">
			<p>Selektujte slike koje zelite da obrisete</p>
			@foreach ($article->images as $image)
			<div class="img-div"  style="background-image: url('{{ asset('article-images/'.$image->name)}}');">
				<input name="destroy_images[]" value="{{ $image}}" type="checkbox" />
			</div>
			@endforeach
		</div>	
		<div class="item">
			<p>Dodajte slike</small></p>
			<input type="file" class="form-control" name="images[]" placeholder="address" multiple>
		</div>
		<div class="item">
			<p>Unesite detaljan opis artikla</p>
			<textarea id="ckeditor" name="description">{{ $article->description }}</textarea>
		</div>	
		<div class="btn-block">
			<button type="submit">gotovo</button>
		</div>
	</div>
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
	<script src="/js/ckeditor.js"></script>
	@endsection