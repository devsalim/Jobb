<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Postjob extends Model {

	protected $fillable =  ['post_title', 
							'post_type',
							'post_compname', 
							'prof_category', 
							'role', 
							'city', 
							'state', 
							'min_exp',
							'max_exp', 
							'min_sal', 
							'max_sal', 
							'job_detail', 
							'linked_skill', 
							'post_duration',
							'time_for', 
							'education', 
							'website_redirect_url', 
							'email_id',
							'alt_emailid',
							'phone',
							'alt_phone',
							'individual_id',
							'corporate_id'
						   ];

	public function indUser(){
		return $this->hasOne('App\Induser', 'id', 'individual_id');
	}

	public function corpUser(){
		return $this->hasOne('App\Corpuser', 'id', 'corporate_id');
	}

	public function skills(){
		return $this->belongsToMany('App\Skills')->withTimestamps();
	}

	public function getSkillListAttribute(){
		return $this-skills()->lists('id');
	}

	public function postActivity(){
		return $this->hasMany('App\Postactivity', 'post_id', 'id');
	}

}
