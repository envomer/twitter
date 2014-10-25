<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = array('username', 'email', 'password');


	/**
	 * Set up the relationship between the user and tweets table
	 * 
	 * @return [type] [description]
	 */
	public function tweets()
	{
		return $this->hasMany('Tweet');
	}

	/**
	 * Follow a Person
	 * 
	 * @param  [type] $userToFollow [description]
	 * @return [type]               [description]
	 */
	public function follow($userToFollow)
	{
		return $this->follows()->attach($userToFollow);
	}

	/**
	 * Unfollow a Person
	 * 
	 * @param  [type] $userToUnfollow [description]
	 * @return [type]                 [description]
	 */
	public function unfollow($userToUnfollow)
	{
		return $this->follows()->detach($userToUnfollow);
	}

	/**
	 * Check whether the user is following another user
	 * 
	 * @param  [type]  $user [description]
	 * @return boolean       [description]
	 */
	public function isFollowedBy($user)
	{
		$ids = $user->follows()->lists('followed_id');

		return in_array($this->id, $ids);
	}

	/**
	 * Get the Tweets Feed of a User
	 * 
	 * @return [type] [description]
	 */
	public function getTweetsFeed()
	{
		$ids = $this->follows()->lists('followed_id');
		$ids[] = $this->id;

		return Tweet::whereIn('user_id', $ids);
	}

	/**
	 * The list of people the current logged in user is following
	 * 
	 * @return [type] [description]
	 */
	public function followedUsers()
	{
		return $this->follows();
	}

	/**
	 * The list of people that are following the current logged in user
	 * @return [type] [description]
	 */
	public function followers()
	{
		return $this->belongsToMany(self::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
	}

	/**
	 * Set up the relationship with the follow
	 * 
	 * @return [type] [description]
	 */
	public function follows()
	{
		return $this->belongsToMany(self::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
	}
}
