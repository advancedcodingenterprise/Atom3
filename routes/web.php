<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('home');
	return redirect('/home');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile')->middleware('auth');
Route::post('/edit_profile', 'HomeController@editProfile')->name('editProfile')->middleware('auth');
Route::post('/edit_password', 'HomeController@editPassword')->name('editPassword')->middleware('auth');

Route::get('/added_books', 'BooksController@addedBooks')->name('addedBooks')->middleware('auth');
Route::get('/my_books', 'BooksController@myBooks')->name('myBooks')->middleware('auth');
Route::get('/add_book', 'BooksController@addBook')->name('addBook')->middleware('auth');
Route::post('/add_new_book', 'BooksController@addNewBook')->name('addNewBook')->middleware('auth');
Route::match(['post', 'get'], '/edit_book/{book_id}', 'BooksController@editBook')->name('editBook')->middleware('auth');
Route::post('/delete_book', 'BooksController@deleteBook')->name('deleteBook')->middleware('auth');

Route::post('/add_to_favorites', 'FavoritesController@addToFavorites')->name('addToFavorites')->middleware('auth');
Route::post('/remove_from_favorites', 'FavoritesController@removeFromFavorites')->name('removeFromFavorites')->middleware('auth');