<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Corpuser extends Model {

	protected $fillable = ['firm_type', 'firm_name', 'firm_email_id', 'firm_password'];

	public function user(){
		return $this->hasOne('App\User', 'corpuser_id', 'id');
	}

	public function followers(){
		return $this->belongsToMany('App\Induser', 'follows', 'corporate_id', 'individual_id');
	}

}
