@extends('main')

@section('content')
<h1>Prijavite se</h1>
<div class="forms">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Addresa</label>
        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
        <label for="password">Lozinka</label>
        <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                   
        <input type="submit" value="{{ __('Login') }}" >
        
       
    </form>
</div>

@endsection
