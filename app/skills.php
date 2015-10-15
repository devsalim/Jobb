<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model {

	protected $fillable = ['name'];

	public function posts(){
		return $this->belongsToMany('App\Postjob');
	}

}
