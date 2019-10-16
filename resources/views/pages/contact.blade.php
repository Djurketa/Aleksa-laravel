@extends('main')
@section('content')
<h1>Kontaktirajte nas</h1>
<div class="forms">
	<form action="{{  route('sendMail') }}" method="post">
		@csrf
		<label for="fname">Ime</label>
		<input type="text" id="fname" name="firstname" placeholder="Unesite ime..">

		<label for="lname">Prezime</label>
		<input type="text" id="lname" name="lastname" placeholder="Unesite prezime..">

		<label for="email">E-mail Adresa</label>
		<input type="text" id="email" name="email" placeholder="Unesite E-mail adresu">

		<label for="text">Tekst poruke</label>
		<textarea id="text" name="text" placeholder="Unesite poruku..." style="height:200px"></textarea>

		<input type="submit" value="Posalji">

	</form>
</div> 
@endsection