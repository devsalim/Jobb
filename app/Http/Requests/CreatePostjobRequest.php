<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePostjobRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'post_title'	=>	'required',
			'role'			=>	'required',
			'prof_category'	=>	'required',
			'city'			=>	'required',
			'time_for'		=>	'required',
			'alt_emailid'	=>	'email',
			'alt_phone'		=> 	'numeric'

		];
	}

}
