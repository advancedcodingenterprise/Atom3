@extends('layouts.app')
@section('content')
<div class="container mt-3">
	<h1 class="text-center">My Library</h1>
	
	<div class="row">
	
		@forelse ($my_books as $book)
		<div class="col-md-4" id="favorite-book-{{ $book->id }}">
			<div class="card mb-4 shadow-sm">
				<img src="images/{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->name }}" />
				<div class="card-body">
					<h4>{{ $book->name }} ({{ $book->year }})</h4>
					<p class="card-text">{{ $book->description }}</p>
					
					<button type="button" class="btn btn-block btn-sm btn-success" id="button-favorites-{{ $book->id }}" onclick="removeFromFavoritesInner({{ $book->id }});"><i class="fas fa-heart-broken"></i> Remove From Favorites</button>
				</div>
			</div>
		</div>
		@empty
		<div class="col-md-12"><div class="alert alert-warning">Your library is still empty! Go in the <a href="{{ route('home') }}">public library</a> and add some books here.</div></div>
		@endforelse
        
	</div>
</div>
@endsection