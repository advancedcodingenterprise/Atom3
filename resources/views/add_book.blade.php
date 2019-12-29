@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			@if($book_added)
				<div class="alert alert-success mt-3"><strong>Success!</strong> Book is added successfully to the <a href="{{ route('home') }}">public library</a>.</div>
			@endif
            <div class="card mt-3">
                <div class="card-header">{{ __('Add New Book') }}</div>
				
                <div class="card-body">
                    <form method="POST" action="{{ route('addNewBook') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
								
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<small id="emailHelp" class="form-text text-muted">Please provide the exact name of the uploaded book.</small>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="isbn" class="col-md-4 col-form-label text-md-right">{{ __('ISBN') }}</label>

                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn') }}" required autocomplete="isbn" autofocus>

                                @error('isbn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<small id="emailHelp" class="form-text text-muted">International Standard Book Number.</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
							
								<select class="custom-select @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}" required>
									<option selected>--Year Published--</option>
									@foreach ($years as $year)
									<option value="{{ $year }}">{{ $year }}</option>
									@endforeach
								</select>
                                

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<small id="emailHelp" class="form-text text-muted">Year of publishing the book.</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								<small id="emailHelp" class="form-text text-muted">Detailed description about the book.</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cover_image" class="col-md-4 col-form-label text-md-right">{{ __('Cover Image') }}</label>

                            <div class="col-md-6">
                                <input id="cover_image" type="file" class="form-control-file" name="cover_image" required>
								
								@error('cover_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								@foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
								<small id="emailHelp" class="form-text text-muted">JPG or PNG cover image of the book.</small>
                            </div>
							
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Add Book') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection