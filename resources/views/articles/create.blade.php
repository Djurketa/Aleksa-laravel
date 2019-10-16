@extends('main')
@section('content')
<h1>Kreirajte Artikal</h1>
<div class="create-container">
	<form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
		@csrf
		<div class="item">
			<p>Naziv Artikla<span class="required">*</span></p>
			<div class="name-item">
				<input type="text" name="title" placeholder="Naziv..." required/>
			</div>
		</div>
		<div class="item">
			<p>Cijena Artikla<span class="required">*</span></p>
			<div class="name-item">
				<input type="number" name="price" placeholder="Cijena u KM" required/>
			</div>
		</div>
		<div class="position-item">
			<div class="item">
				<p>Odaberite kategoriju<span class="required">*</span></p>
				<select name="category_id" required>
					@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="question">
			<p>Selektujte stanje</p>
			<div class="question-answer">
				<div>
					<input type="radio"  checked value="novo" id="radio_5" name="condition" />
					<label for="radio_5" class="radio"><span>Novo</span></label>
				</div>
				<div>
					<input type="radio" value="polovno" id="radio_6" name="condition" />
					<label for="radio_6" class="radio"><span>Koristeno</span></label>
				</div>
			</div>
		</div>
		<div class="item">
			<p>Dodajte slike</small></p>
			<input type="file" class="form-control" name="images[]" placeholder="address" multiple>
		</div>
		<div class="item">
			<p>Unesite detaljan opis artikla</p>
			<textarea id="ckeditor" name="description"></textarea>
		</div>	
		<div class="btn-block">
			<button type="submit" >gotovo</button>
		</div>
	</form>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/js/ckeditor.js"></script>
@endsection