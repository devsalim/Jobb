<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $fillable = ['group_name', 'admin_id'];

	public function users()
    {
        return $this->belongsToMany('App\Induser', 'groups_users', 'group_id', 'user_id')->withPivot('id');
    }

    public function admin()
    {
        return $this->belongsTo('App\Induser', 'admin_id', 'id')->select('id', 'fname', 'lname');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Postjob', 'post_group_taggings', 'group_id', 'post_id')->withPivot('id');
    }

    public function postsCount()
    {
        return $this->belongsToMany('App\Postjob', 'post_group_taggings', 'group_id', 'post_id')
			        ->selectRaw('count(postjobs.id) as totalPosts')
			        ->groupBy('post_group_taggings.group_id');;
    }

}
