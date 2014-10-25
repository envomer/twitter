<?php

class UsersController extends BaseController {


	/**
	 * Show the profile page of a specific User
	 * 
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function show( $username )
	{
		// fetch the user information from the DB
		$user = User::whereUsername($username)->firstOrFail();
		$ids = $user->follows()->lists('followed_id');
		$ids[] = $user->id;

		$tweets = Tweet::whereIn('user_id', $ids)->latest()->paginate(30);
		// $tweets = $user->getTweetsFeed()->paginate(30);

		return View::make('user.profile', compact('user', 'tweets'));
	}

	/**
	 * Show the Register Form
	 * @return [type] [description]
	 */
	public function create()
	{
		return View::make('pages.register');
	}

	/**
	 * Store a new User
	 * @return [type] [description]
	 */
	public function store()
	{
		// fetch the POST values
		$input = Input::all();

		// check if fields are set
		$validator = Validator::make($input, array(
			'email' => 'required|email|unique:users',
			'username' => 'required|unique:users',
			'password' => 'required|confirmed'
		));

		// if the validation succeeds, then try to add the new user the database
		if( ! $validator->fails() ) {
			$input['password'] = Hash::make( $input['password'] );
			$user = User::create($input);

			// now login the user
			Auth::login($user, false);

			// set a flash message and redirect back
			return Redirect::intended('/')->with('flash_message', 'You have been logged in!');
		}

		// Validation failed.
		return Redirect::back()->withErrors($validator)->withInput();
	}

}
