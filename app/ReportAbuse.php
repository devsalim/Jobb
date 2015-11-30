<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportAbuse extends Model {

	public function user(){
		return $this->belongsTo('App\Induser', 'reported_by', 'id')->select('id', 'fname', 'lname');
	}

	public function postuser(){
		return $this->belongsTo('App\Postjob', 'post_id', 'id');
	}

}
