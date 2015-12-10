<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	public function fromUser(){
		return $this->hasMany('App\User', 'id', 'from_user')->select('id', 'name', 'identifier');
	}

	public function toUser(){
		return $this->hasMany('App\User', 'id', 'to_user')->select('id', 'name', 'identifier');
	}

	public function user(){
        return $this->belongsTo('App\User');
    }

}
