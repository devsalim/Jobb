<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class skills extends Model {

	//

	public function posts(){
		return $this->belongsToMany('App\Postjob');
	}

}
