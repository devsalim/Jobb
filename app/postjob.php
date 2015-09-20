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

}
