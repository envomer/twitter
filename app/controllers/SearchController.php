<?php

class SearchController extends \BaseController {

	public function tweets()
	{
		$terms = explode(' ', Input::get('query'));

		$query = Tweet::with('user');

		foreach ($terms as $term) {
			$query->where('body', 'LIKE', '%' . $term . '%');
		}

		$tweets = $query->paginate(30);

		return View::make('search.tweets', compact('tweets'));
	}


}
