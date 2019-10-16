@extends('main')

@section('content')

<h2 class="text-center">{{ Auth::user()->name }}</h2>

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
			<a href="{{ route('articles.show',$article) }}">
				<button class="button"><i class="fas fa-eye"></i> Detaljnije <i class="fas fa-edit"> </i></button>
			</a> 
		</div>
		<div class="time">
			<h5>{{ $article->created_at }}</h5>
		</div>
	</div>

	@endforeach

</div>
<div class="links">
	{{ $articles->links() }}
</div>

@endsection
