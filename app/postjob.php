<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class postjob extends Model {

	//
	protected $fillable = ['post_title', 'post_compname', 'prof_category', 'role', 'city', 'state', 'min_exp', 'min_sal', 'job_detail', 'linked_skill', 'post_duration', 'email_id', 'alt_emailid', 'phone', 'alt_phone'];

}
