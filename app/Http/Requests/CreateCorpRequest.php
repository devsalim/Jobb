<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCorpRequest extends Request {

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
			'firm_name'			=>	'required',
			'firm_email_id'		=>	'required|email|unique:corpusers',
			'firm_password'		=>	'required|min:6',
			'firm_type'			=>	'required'
		];
	}

}
