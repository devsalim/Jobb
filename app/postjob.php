<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class postjob extends Model {

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
							'email_id',
							'phone',
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

}
