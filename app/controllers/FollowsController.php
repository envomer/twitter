<?php

class FollowsController extends \BaseController {


	/**
	 * Follow a User
	 *
	 * @return Response
	 */
	public function store()
	{
		$id = Input::get('userToFollow');
		$message = 'Oops! Something went terribly wrong!';

		if($id)
		{
			// check wheter the user exists
			$userToFollow = User::findOrFail($id);
			// user found. now follow
			Auth::user()->follow($id);
			$message = 'You are now following ' . $userToFollow->username . '!';
		}

		// redirect back to the previous page with a flash message
		return Redirect::back()->with('flash_message', $message );	
	}

	/**
	 * A list of people the user is following
	 * 
	 * @param  [type] $username [description]
	 * @return [type]         [description]
	 */
	public function index($username)
	{
		$user = (Auth::check() && $username == Auth::user()->username) ? Auth::user() : User::whereUsername($username)->first();
		$following = $user->followedUsers()->paginate(40);

		return View::make('user.following', compact('following', 'user'));
	}

	/**
	 * get the followers of a person
	 * 
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function followers($username)
	{
		$user = (Auth::check() && $username == Auth::user()->username) ? Auth::user() : User::whereUsername($username)->first();
		$followers = $user->followers()->paginate(40);

		return View::make('user.followers', compact('followers', 'user'));
	}


	/**
	 * Unfollow User
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$message = 'Oops! Something went terribly wrong!';

		if($id)
		{
			// check wheter the user exists
			$userToUnfollow = User::findOrFail($id);
			// user found. now follow
			Auth::user()->unfollow($id);
			$message = 'You have unfollowed ' . $userToUnfollow->username . '!';
		}

		// redirect back to the previous page with a flash message
		return Redirect::back()->with('flash_message', $message );
	}


}
