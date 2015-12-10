<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	public function fromUser(){
		return $this->hasMany('App\User', 'from_user', 'id')->select('id', 'name', 'identifier');
	}

	public function toUser(){
		return $this->hasMany('App\User', 'to_user', 'id')->select('id', 'name', 'identifier');
	}

}
