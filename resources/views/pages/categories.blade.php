@extends('main')
@section('content')
<h1>Kategorije</h1>

<div class="container" style="border:none;">

	@foreach ($categories as $category)

	<a href="{{ route('categories',$category->id) }}">
		<div class="card">
			<div class="faicon">
				<i class="fas fa-{{ $category->image }}"></i>
			</div>
			<div class="price">
				<h5 class="mt">{{ $category->name}}</h5>
			</div>
		</div>
	</a>

	@endforeach

</div>

@endsection