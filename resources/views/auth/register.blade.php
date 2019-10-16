@extends('main')

@section('content')
<h1>Registrujte se</h1>
<div class="forms">

  <form method="POST" action="{{ route('register') }}">
    @csrf
    
    <label for="name" >Ime i Prezime</label>
    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label for="email">E-Mail Addresa</label>
    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <label  for="password">Lozinka</label>
    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    
    <label for="password-confirm">Ponovite lozinku</label>
    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

    <input type="submit" value=" {{ __('Register') }}">

</form>
</div>
@endsection
