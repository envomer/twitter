<?php

class Tweet extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tweets';

	protected $fillable = array('body');

	/**
	 * The tweets belong to a user
	 * @return [type] [description]
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}
}
