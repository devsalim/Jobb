<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PostUserTagging extends Model {

	public function post()
    {
        return $this->belongsTo('App\Postjob');
    }

}
