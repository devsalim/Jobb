<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePostskillRequest extends Request {

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
			'email_id'		=>  'email',
			'alt_emailid'	=>	'email|unique:indusers|unique:corpusers',
			'phone'			=>	'numeric',
			'alt_phone'		=> 	'numeric'
		];
	}

}
