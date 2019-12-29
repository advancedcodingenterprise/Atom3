$(function () {
	$('[data-toggle="tooltip"]').tooltip()
});
function addToFavorites(book_id) {
	$.ajax({
		url: "add_to_favorites",
		method: "POST",
		data: {
			"_token": csrf_token,
			book_id: book_id
		},
		dataType: 'json'
	}).done(function(response) {
		if(response.success == true) {
			$('#button-favorites-'+book_id).removeClass('btn-outline-success').addClass('btn-success').html('<i class="fas fa-heart-broken"></i> Remove From Favorites').attr('onclick', 'removeFromFavorites('+book_id+')');
		}
	});
}
function removeFromFavorites(book_id) {
	if(confirm('Are you sure you want to remove this book from favorites?')) {
		$.ajax({
			url: "remove_from_favorites",
			method: "POST",
			data: {
				"_token": csrf_token,
				book_id: book_id
			},
			dataType: 'json'
		}).done(function(response) {
			if(response.success == true) {
				$('#button-favorites-'+book_id).addClass('btn-outline-success').removeClass('btn-success').html('<i class="fas fa-heart"></i> Add To Favorites').attr('onclick', 'addToFavorites('+book_id+')');
			}
		});
	}
}
function removeFromFavoritesInner(book_id) {
	if(confirm('Are you sure you want to remove this book from favorites?')) {
		$.ajax({
			url: "remove_from_favorites",
			method: "POST",
			data: {
				"_token": csrf_token,
				book_id: book_id
			},
			dataType: 'json'
		}).done(function(response) {
			if(response.success == true) {
				$('#favorite-book-'+book_id).remove();
			}
		});
	}
}
function deleteBook(book_id) {
	if(confirm('Are you sure you want to completely remove this book from the public library?')) {
		$.ajax({
			url: "delete_book",
			method: "POST",
			data: {
				"_token": csrf_token,
				book_id: book_id
			},
			dataType: 'json'
		}).done(function(response) {
			if(response.success == true) {
				//$('#favorite-book-'+book_id).remove();
			}
		});
	}
}