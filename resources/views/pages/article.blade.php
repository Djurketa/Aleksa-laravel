@extends('main')
@section('content')
<h1 class="article-title">{{ $article->title }}</h1>
<div class="article-container">
	@yield('userOptions')
	<div class="image-view">
		<img id="preview" src="">
	</div>
	<div class="info-container">
		<div class="article-info-image">
			
			@if (!empty($article->images->first()->name))
			<div id="big-img" style="background-image: url({{ asset('article-images/'.$article->images->first()->name) }})"></div>
			@else()
			<div id="big-img" style="background-image: url( {{ asset('imgs/logo2.jpg')}})"></div>
			@endif  
			
		</div>
		<div class="article-info">
			<p><i class="fas fa-bars"></i> Kategorija > {{ $article->category->name }}</p>
			<h1> {{ $article->title }}</h1>
			<div class="boxes">
				<div class="box" >
					<p class="top"><i class="fas fa-money-bill-alt"></i> cijena</p>
					<p >{{ $article->price }} KM</p>
				</div>
				<div class="box" id="condition">
					<p class="top cond"><i class="fas fa-tags"></i> stanje</p>
					<p>{{ $article->condition }}</p>
				</div>
				<div class="box" >
					<p class="top user"><i class="fas fa-user"></i> korisnik</p>
					<p> {{ $article->user->name}}</p>
				</div>
			</div>
			<p class="date">Objaveljeno:{{ $article->created_at->format('d-M-Y')}}.</p>
			<div class="article-images">
				
				@foreach ($article->images as $image)
				<img id="small-img" src="{{ asset('article-images/'.$image->name) }}">
				@endforeach

			</div>
		</div>
	</div>
	<p class="pl">Detaljan opis</p>
	<div class="article-description">
		{!! $article->description!!}
	</div>
</div>
<ul  class="comment-section">
	<p>KOMENTARI</p>
	
	@foreach ($article->comment as $comment)
		<li class="comment {{ $article->user_id == $comment->user_id ? 'author-comment' : "user-comment" }}">
			<div class="info">
				<a href="#">{{ $comment->user->name }}</a>
				<span>{{ $comment->created_at }}</span>
			</div>
			<p>{{ $comment->text }}</p>
		</li>
		@if( Auth::check() )
			@if( Auth::user()->id == $comment->user_id )
				<form action="{{ route('comments.destroy',$comment) }}" method="post">
					@csrf
					@method('delete')
					<button class="delete-comment" onclick="return confirm('Jeste li sigurni?')">Obrisi</button>
				</form>
			@endif
		@endif
	@endforeach
	<!-- More comments -->
	<li class="write-new">
		<label>Napisite komentar :</label>
		<form action="{{ route('comments.store',$article) }}" method="post">
			@csrf
			<textarea placeholder="Write your comment here" name="text"></textarea>
			<div>
				<button type="submit">Submit</button>
			</div>
		</form>
	</li>
</ul>

<script src="/js/showImage.js "></script>
@endsection