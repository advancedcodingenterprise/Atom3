<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Auth;

use DB;

class BooksController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function myBooks() {
		
		$my_books = DB::table('favorites')
			->leftJoin('books', 'books.id', '=', 'favorites.book_id')
			->where('favorites.user_id', Auth::id())
			->orderBy('favorites.created_at', 'desc')
			->select('books.name', 'books.id', 'books.year', 'books.description', 'books.cover_image')
			->get();
		
		return view('my_books',array(
			'my_books'=>$my_books
		));
    }
	public function deleteBook(Request $request) {
		
	}
	public function editBook(Request $request) {
		
		$book_edited = false;
		if($request->isMethod('post')) {
			
			
			$old_book = \App\Books::where([
				['created_by', Auth::id()],
				['id', $request->book_id],
			])->first();
			
			if($old_book) {
				$book_edited = true;
				if($request->cover_image) {
					if(\File::exists(public_path('images/'.$old_book->cover_image))){
						\File::delete(public_path('images/'.$old_book->cover_image));
					}else{
						dd('File does not exists.');
					}
					
					$request->validate([
						'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
					]);
					$imageName = time().'.'.$request->cover_image->extension();
					$request->cover_image->move(public_path('images'), $imageName);
					
					$update_array = [
						'name' => $request->name,
						'isbn' => $request->isbn,
						'description' => $request->description,
						'year' => $request->year,
						'cover_image' => $imageName
					];
				} else {
					$update_array = [
						'name' => $request->name,
						'isbn' => $request->isbn,
						'description' => $request->description,
						'year' => $request->year
					];
				}
				\App\Books::where('id', $request->book_id)->update($update_array);
			
			} else {
				$book_edited = false;
			}
			
		}
		
		
		$book = \App\Books::where([
			['created_by', Auth::id()],
			['id', $request->book_id],
		])->first();
		
		$years = array();
		for($i = date('Y');$i>= 1950;$i--) {
			$years[] = $i;
		}
		
		return view('edit_book',array(
			'years'=>$years,
			'book_edited'=>$book_edited,
			'book' => $book
		));
	}
	public function addBook() {
		
		$years = array();
		for($i = date('Y');$i>= 1950;$i--) {
			$years[] = $i;
		}
		
		return view('add_book',array(
			'years'=>$years,
			'book_added' => false
		));
    }
	public function addNewBook(Request $request) {
		
		$request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);
		$imageName = time().'.'.$request->cover_image->extension();
		$request->cover_image->move(public_path('images'), $imageName);
		
		$book = new \App\Books;
		$book->name = $request->name;
		$book->isbn = $request->isbn;
		$book->year = $request->year;
		$book->description = $request->description;
		$book->cover_image = $imageName;
		$book->created_by = Auth::id();
		$book->save();
		
		$years = array();
		for($i = date('Y');$i>= 1950;$i--) {
			$years[] = $i;
		}
		
		return view('add_book',array(
			'years'=>$years,
			'book_added' => true
		));
    }
	public function addedBooks() {
		$books = \App\Books::where('created_by', Auth::id())->orderBy('id', 'desc')->get();
		
		return view('added_books',array(
			'new_book' => false,
			'books' => $books
		));
    }

}
