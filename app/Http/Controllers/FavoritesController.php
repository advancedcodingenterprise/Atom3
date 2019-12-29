<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;

class FavoritesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function addToFavorites(Request $request) {
		$favorite = new \App\Favorites;
		$favorite->book_id = $request->book_id;
		$favorite->user_id = Auth::id();
		$favorite->save();
		
		return response()->json([
			'success' => true
		]);
    }
	
	public function removeFromFavorites(Request $request) {
		DB::table('favorites')->where([
			['book_id', $request->book_id],
			['user_id', Auth::id()],
		])->delete();
		
		return response()->json([
			'success' => true
		]);
    }
}
