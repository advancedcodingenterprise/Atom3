<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
	<a class="navbar-brand" href="{{ route('home') }}">Atom Library</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			@if(Route::currentRouteName() == 'home')
			<li class="nav-item active">
				<a class="nav-link" href="{{ route('home') }}"><i class="fas fa-book-open"></i> Library</a>
			</li>
			@else
			<li class="nav-item">
				<a class="nav-link" href="{{ route('home') }}"><i class="fas fa-book-open"></i> Library</a>
			</li>
			@endif
			
			@if(Auth::check())
				
			@if(Route::currentRouteName() == 'myBooks')
			<li class="nav-item active">
				<a class="nav-link" href="{{ route('myBooks') }}"><i class="fas fa-book-reader"></i> My Library</a>
			</li>
			@else
			<li class="nav-item">
				<a class="nav-link" href="{{ route('myBooks') }}"><i class="fas fa-book-reader"></i> My Library</a>
			</li>
			@endif
			
			@if(Route::currentRouteName() == 'addBook')
			<li class="nav-item active">
				<a class="nav-link" href="{{ route('addBook') }}"><i class="fas fa-plus"></i> Add Book</a>
			</li>
			@else
			<li class="nav-item">
				<a class="nav-link" href="{{ route('addBook') }}"><i class="fas fa-plus"></i> Add Book</a>
			</li>
			@endif
			
			@endif
		</ul>
		@if(Auth::check())
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
			</button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
				<a class="dropdown-item" href="{{ route('addedBooks') }}"><i class="fas fa-book"></i> Added Books</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
			</div>
		</div>
		@else
		<div class="btn-group" role="group" aria-label="Basic example">
			<a class="btn btn-outline-primary my-2 my-sm-0" href="{{ route('login') }}">Login</a>
			<a class="btn btn-outline-primary my-2 my-sm-0" href="{{ route('register') }}">Register</a>
		</div>
		@endif
	</div>
</nav>