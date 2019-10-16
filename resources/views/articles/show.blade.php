

@extends('pages.article')
@section('userOptions')
<div class="user-options">

		<a href="{{ route('articles.edit',$article) }}"><button><i class="fas fa-edit"></i> Uredi</button></a>
	
	<form method="post" action="{{ route('articles.destroy',$article) }}">
		@method('delete')
		@csrf
		<button onclick="return confirm('Jeste li sigurni da zelite obrisati artikal?')"><i class="fas fa-trash"></i> Obrisi</button>
	</form>
</div>
@endsection

