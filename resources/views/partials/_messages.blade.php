
@if (Session::has('success'))

<div role="alert">
	<center style="color: green">{{ Session::get('success') }}</center>
</div>

@endif

@if (count($errors) >0 )

<div role="alert">
	<ul>
		@foreach ($errors->all() as $error)
		
		<li style="text-align: center;color: red;" >{{ $error }}</li>
		
		@endforeach
	</ul>
</div>

@endif