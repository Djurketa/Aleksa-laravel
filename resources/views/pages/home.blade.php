@extends('main')
@section('content')

<h1>Dobrodosli na Oglasavanje.com</h1>
<div class="adds-div">
	
</div>
<h2>Izdvojeni artikli</h2>
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
			<a href="{{ route('article',$article->id) }}">
				<button class="button"><i class="fas fa-eye"></i> Detaljnije</button>
			</a> 
		</div>
		<div class="time">
			<h5><i class="fas fa-clock"></i> {{ $article->created_at->diffForHumans() }}</h5>
		</div>
	</div>
	
	@endforeach

</div>
<div class="links">
	{{ $articles->links() }}
</div>

<script src="/js/adds.js"></script>
@endsection

