<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Connections extends Model {

	public function user(){
		return $this->hasOne('App\Induser', 'id', 'connection_user_id');
	}
}
