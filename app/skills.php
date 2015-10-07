<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model {

	//

	public function posts(){
		return $this->belongsToMany('App\Postjob');
	}

}
