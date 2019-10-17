@extends('main')
@section('content')
<div class="filter">

	<form action="{{ route('filter')}}" method="get">
		<input type="hidden" name="string" value="{{ Request::get('string') }}">
		<i style="background-color: antiquewhite;margin-right:10px;" > Filtrirajte artikle: </i>
		<input type="hidden" name="category" value=" {{ Request::segment(1)=="categories" ? Request::segment(2) : Request::get('category') }} ">
		<div class="filter-block">
			<label>Cijena od :</label>
			<input type="number" name="min" placeholder="KM" value="{{ old('min') }}">
			<label>do</label>
			<input type="number" name="max" placeholder="KM" value="{{ old('max') }}">
		</div>
		<div class="filter-block">
			<select name="condition">
				<option value="" selected>Stanje</option>
				<option {{ old('condition') == 'new'  ? 'selected' : ""  }} value="new">Novo</option>
				<option {{ old('condition') == 'used' ? 'selected' : ""  }} value="used">Koristeno</option>
			</select>
		</div>
		<div  class="filter-block">
			<select  name="sort" >
				<option value="" selected>Prikazi po</option>
				<option {{ old('sort') == 'highest' ? 'selected' : ""  }} value="highest">Cijeni-Najvisoj</option>
				<option {{ old('sort') == 'lowest'  ? 'selected'  : "" }} value="lowest">Cijeni-Najnizoj</option>
				<option {{ old('sort') == 'newest'  ? 'selected'  : "" }} value="newest">Datumu-Najnovije</option>
				<option {{ old('sort') == 'oldest'  ? 'selected'  : "" }} value="oldest">Datumu-Najstarije</option>
			</select>
		</div>
		<button></button>
	</form>
</div>
<div class="container">
	
	@foreach ($articles as $article)
	<div class="card">
		<div class="image">

			@if (!empty($article->images->first()->name))
			<img src="{{ asset('article-images/'.$article->images->first()->name) }}">
			@else()
			<img src="{{ asset('imgs/logo2.jpg')}}"> 
			@endif    
		
		</div>
		<div class="title">
			<h5>{{ $article->title}}</h5>
		</div>
		<div class="price">
			<h5>{{ $article->price }} KM</h5>
		</div>
		<div class="btn-div">
			<a href="{{ route('article',$article) }}">
				<button class="button"><i class="fas fa-eye"></i> Detaljnije</button>
			</a> 
		</div>
		<div class="time">
			<h5>{{ $article->created_at->diffForHumans() }}</h5>
		</div>
	</div>
	@endforeach

</div>
<div class="links">
	{{ $articles->links() }}
</div>
@endsection




