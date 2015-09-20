<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class induser extends Model {

	protected $fillable = ['fname', 'lname', 'email', 'mobile', 'password'];

	public function user(){
		return $this->hasOne('app\user');
	}

}
