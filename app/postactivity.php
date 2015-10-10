<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Postactivity extends Model {

	public function user()
    {
        return $this->belongsTo('App\Induser');
    }

}
