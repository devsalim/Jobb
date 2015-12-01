<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {

	public function user(){
		return $this->belongsTo('App\Induser', 'user_id', 'id')->select('id', 'fname', 'lname');
	}

}
