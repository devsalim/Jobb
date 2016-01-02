<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Postjob extends Model {

	protected $fillable =  ['post_title', 
							'post_type',
							'post_compname',  
							'role', 
							'city', 
							'state', 
							'min_exp',
							'max_exp', 
							'min_sal', 
							'max_sal', 
							'salary_type',
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
							'reference_id',
							'contact_person',
							'corporate_id',
							'unique_id',
							'resume_required'
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

	public function taggedUser(){
		return $this->belongsToMany('App\Postjob', 'post_user_taggings', 'post_id', 'user_id')->withTimestamps();
	}

	public function tagged(){
		return $this->hasMany('App\PostUserTagging', 'post_id', 'id');
	}

	public function sharedBy(){
		return $this->belongsToMany('App\Induser', 'post_user_taggings', 'post_id', 'tag_share_by')->select('user_id', 'mode', 'tag_share_by', 'fname', 'lname');
	}

	public function taggedGroup(){
		return $this->belongsToMany('App\Postjob', 'post_group_taggings', 'post_id', 'group_id')->withTimestamps();
	}

	public function groupTagged(){
		return $this->hasMany('App\PostGroupTagging', 'post_id', 'id')->select('group_id', 'mode', 'tag_share_by');
	}

	public function sharedGroupBy(){
		return $this->belongsToMany('App\Induser', 'post_group_taggings', 'post_id', 'tag_share_by')->select('group_id', 'mode', 'tag_share_by', 'fname', 'lname');
	}

	public function sharedToGroup(){
		return $this->belongsToMany('App\Group', 'post_group_taggings', 'post_id', 'group_id')->select('group_id', 'mode', 'tag_share_by', 'group_name');
	}

	public function user(){
		return $this->belongsTo('App\Induser');
	}

	public function magicMatch(){
		 
		if (array_key_exists('linked_skill', $this->attributes))
	    {
	        return $this->attributes['linked_skill'];
	    }

				// $postSkills = $this->indUser();
				// $userSkills = $this->ind_user->linked_skill;

				// $postSkillCount = count($postSkills);
				// $userSkillCount = count($userSkills);

				// return $postSkills;

		
	}

}
