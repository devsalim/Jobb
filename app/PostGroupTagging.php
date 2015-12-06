<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PostGroupTagging extends Model {

	public function user(){
		return $this->hasOne('App\Induser', 'id', 'tag_share_by')->select('id', 'fname', 'lname');
	}

}
