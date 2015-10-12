<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Postactivity extends Model {

	public function user()
    {
        return $this->belongsTo('App\Induser')->select('id', 'fname', 'profile_pic');
    }

    public function post()
    {
        return $this->belongsTo('App\Postjob')->select('id', 'individual_id');
    }

}
