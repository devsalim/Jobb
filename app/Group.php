<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $fillable = ['group_name', 'admin_id'];

	public function users()
    {
        return $this->belongsToMany('App\Induser', 'groups_users', 'group_id', 'user_id')
    			    ->withPivot('id');
    }

}
