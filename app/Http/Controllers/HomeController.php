<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller {

    public function __construct() {
        //
    }

    public function editPassword(Request $request) {
		
	}
	public function editProfile(Request $request) {
		
		$userDetails = Auth::user();
		$user = \App\User::find($userDetails ->id);
		
		$user->firstname=$request->input('firstname');
		$user->lastname=$request->input('lastname');
		$user->email=$request->input('email');

		$user->save();
		
		session(['profile_updated' => 'true']); 
		
		return redirect()->route('profile');
	}
    public function profile() {
		$this->middleware('auth');
		 return view('profile',array(
			'user'=>Auth::user()
		));
	}
	
    public function index() {
		$books_collection = \App\Books::all();
		$books = array();
		foreach($books_collection as $book) {
			$is_favorite = false;
			if(Auth::check()) {
				$favorite = \App\Favorites::where([
					['book_id', $book->id],
					['user_id', Auth::id()]
				])->first();
				if($favorite) {
					$is_favorite = true;
				}
			}

			$books[] = (object)array(
				'id' => $book->id,
				'name' => $book->name,
				'description' => $book->description,
				'year' => $book->year,
				'cover_image' => $book->cover_image,
				'is_favorite' => $is_favorite
			);
		}

        return view('home',array(
			'books'=>(object)$books
		));
    }
}
