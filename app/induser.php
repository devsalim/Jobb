<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class induser extends Model {

	protected $fillable = ['fname', 'lname', 'email', 'mobile', 'password'];

}
