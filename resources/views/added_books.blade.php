@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-striped table-bordered mt-3">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Cover</th>
					<th scope="col">Name</th>
					<th scope="col">Year</th>
					<th scope="col">ISBN</th>
					<th scope="col">Description</th>
					<th scope="col" class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				@forelse ($books as $book)
				<tr>
					<th scope="row">{{ $book->id }}</th>
					<td><img src="images/{{ $book->cover_image }}" class="img-fluid" alt="{{ $book->name }}" style="max-height:80px"></td>
					<td>{{ $book->name }}</td>
					<td>{{ $book->year }}</td>
					<td>{{ $book->isbn }}</td>
					<td>{{ $book->description }}</td>
					<td class="text-right">
						<div class="btn-group" role="group" aria-label="Basic example">
							<a href="{{ route('editBook', $book->id) }}" class="btn btn-info"><i class="fas fa-pen"></i> Edit</a>
							<button type="button" onclick="deleteBook({{ $book->id }});" href="{{ route('deleteBook', $book->id) }}" class="btn btn-danger"><i class="fas fa-times"></i> Delete</button>
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="7">
						<div class="alert alert-warning">No books added yet!</div>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
    </div>
</div>
@endsection