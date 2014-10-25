<?php

class SessionsController extends \BaseController {

	public function __construct()
	{
		// apply the guest filter to all functions except the destroy function
		// that way only guests can view the login page
		$this->beforeFilter('guest', array('except' => 'destroy'));
	}

	/**
	 * Show the Login form
	 * 
	 * @return [type] [description]
	 */
	public function create()
	{
		return View::make('sessions.login');
	}

	/**
	 * Login a User
	 * 
	 * @return [type] [description]
	 */
	public function store()
	{
		// fetch the POST values
		$input = Input::only('username', 'password');

		// check if fields are set
		$validator = Validator::make($input, array(
			'username' => 'required',
			'password' => 'required'
		));

		// if the validation succeeds, then attempt to login the user
		if( ! $validator->fails() ) {
			if( Auth::attempt($input, false) )
			{
				// logged in. set a flash message and redirect back
				return Redirect::intended('/')->with('flash_message', 'You have been logged in!');			
			}
			// login failed. set flash message and redirect back
			return Redirect::back()->with('flash_message', 'Invalid Credentials!')->withInput();
		}

		// Validation failed.
		return Redirect::back()->withErrors($validator)->withInput();
	}

		/**
	 * Log the User out
	 * 
	 * @return [type] [description]
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('/')->with('flash_message', 'You have been logged out!');
	}


}
