<nav>
	<div class="navbar-container">
		<ul class="menu">
			<a href="/"><img class="logo" src="/imgs/logo2.jpg"></a>
			<li><a href="/"><i class="fa fa-home"></i> POCETNA</a></li>
			<li><a href="/categories/all"><i class="fa fa-list"></i> KATEGORIJE</a></li>
			<li><a href="/contact"> <i class="fa fa-envelope"></i> KONTAKT</a></li>
			
			@if (Auth::check())
			
			<li class="dropdown">
				<a href="">
					<i style="font-size: 16px;" class="fas fa-bullhorn"></i>
					<span style="color: red;font-size: 12px;">{{Auth::user()->unReadNotifications->count() }}
					</span>
				</a>
				<ul class="dropdown-content">
					
					@foreach (Auth::user()->unReadNotifications as $notification)
					<li >
						<a href="/article/{{ $notification->data['data']['article_id'] }}">Novi komentar od: {{$notification->data['data']['user_name']}}</a>
						<a href="{{ route('notification',$notification) }}">
							<button class="mark-as-read"><i class="fas fa-trash"></i></button>	
						</a>
					</li>
					@endforeach
					
				</ul>
			</li>
			<li class="dropdown"><a href=""><i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
				<ul class="dropdown-content">
					<li><a href="{{ route('articles.index') }}"><i class="fa fa-database"></i> Moji oglasi</a></li>
					<li><a href="{{ route('articles.create') }}"><i class="fa fa-plus"></i> Dodaj oglas</a></li>
					<li>
						<form method="POST" action="{{ route('logout')}}">
							{{ csrf_field() }}
							<button type="submit" class="logout"><i class="fa fa-sign-out"></i> Logout</button>
						</form>
					</li>
				</ul>
			</li>
			
			@else

			<li><a href="/login"><i class="fa fa-sign-in-alt"></i> PRIJAVA</a></li>
			<li><a href="/register"><i class="fa fa-user-plus"></i> REGISTRACIJA</a></li>

			@endif  
		</ul>
	</div>
	<div class="search-bar">
		<form action="{{ route('filter') }}">
			<input type="text" name="string"  placeholder="{{old('string') != ""  ? old('string') : 'Pretrazi'}}">
			<button type="submit" class="btn btn-primary">
				<i class="fa fa-search"></i> 
			</button>
		</form>
	</div>
</nav>




