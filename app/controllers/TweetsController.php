<?php

class TweetsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a new Tweet
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('tweet');
		// check if fields are set
		$validator = Validator::make($input, array(
			'tweet' => 'required|max:140'
		));

		// if the validation succeeds, then attempt to login the user
		if( ! $validator->fails() ) {
			$tweet = new Tweet( array('body' => $input['tweet']) );

			Auth::user()->tweets()->save($tweet);

			// login failed. set flash message and redirect back
			return Redirect::back()->with('flash_message', 'Your tweet has been posted!');	
		}

		// Validation failed.
		return Redirect::back()->withErrors($validator)->withInput();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
