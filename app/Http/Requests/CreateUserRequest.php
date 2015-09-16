<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateUserRequest extends Request {

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
			'name'		=>	'required',
			'email'		=>	'required_without:mobile|email|unique:indusers',
			'mobile'	=>	'required_without:email|unique:indusers|min:10|max:10',
			'password'	=>	'required|min:6'
		];
	}

}
