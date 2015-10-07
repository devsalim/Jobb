<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Induser extends Model {

	protected $fillable = ['fname', 'lname', 'email', 'mobile', 'password'];

	public function user(){
		return $this->hasOne('app\user', 'induser_id', 'id');
	}

	public function friendsOfMine()
	{
	  return $this->belongsToMany('App\Induser', 'connections', 'user_id', 'connection_user_id')
			      ->withPivot('id')
			      ->withPivot('status');
	}

	public function friendOf()
	{
	  return $this->belongsToMany('App\Induser', 'connections', 'connection_user_id', 'user_id')
	 			 ->withPivot('id')
			     ->withPivot('status');
	}

	public function getFriendsAttribute()
	{
	    if ( ! array_key_exists('connections', $this->relations)) 
	    	$this->loadFriends();

	    return $this->getRelation('connections');
	}

	protected function loadFriends()
	{
	    if ( ! array_key_exists('connections', $this->relations))
	    {
	        $connections = $this->mergeFriends();

	        $this->setRelation('connections', $connections);
	    }
	}

	protected function mergeFriends()
	{
	    return $this->friendsOfMine->merge($this->friendOf);
	}

	public function groups() 
    {
        return $this->belongsToMany('App\Group', 'groups_users', 'user_id', 'group_id')->withPivot('id');
    }


}
