<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class corpuser extends Model {

	protected $fillable = ['firm_type', 'firm_name', 'firm_email_id', 'firm_password'];

}
