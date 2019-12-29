@extends('layouts.app')
@section('content')
<div class="container mt-3">
	<h1 class="text-center">Books</h1>
	
	<div class="row">
	
		@forelse ($books as $book)
		<div class="col-md-4">
			<div class="card mb-4 shadow-sm">
				<img src="images/{{ $book->cover_image }}" class="card-img-top" alt="{{ $book->name }}" />
				<div class="card-body">
					<h4>{{ $book->name }} ({{ $book->year }})</h4>
					<p class="card-text">{{ $book->description }}</p>
					
					@if(Auth::check())
						
					@if($book->is_favorite)
					<button type="button" class="btn btn-block btn-sm btn-success" id="button-favorites-{{ $book->id }}" onclick="removeFromFavorites({{ $book->id }});"><i class="fas fa-heart-broken"></i> Remove From Favorites</button>
					@else
					<button type="button" class="btn btn-block btn-sm btn-outline-success" id="button-favorites-{{ $book->id }}" onclick="addToFavorites({{ $book->id }});"><i class="fas fa-heart"></i> Add To Favorites</button>
					@endif
					
					@else
					<button type="button" class="btn btn-block btn-sm btn-outline-danger disabled" disabled data-toggle="tooltip" data-placement="bottom" title="You must login to use this function!"><i class="fas fa-heart"></i> Add To Favorites</button>
					@endif
				</div>
			</div>
		</div>
		@empty
		<div class="col-md-12"><div class="alert alert-warning">No books added yet!</div></div>
		@endforelse
        
	</div>
</div>
@endsection