<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Http\Requests\CreateUserRequest;
use App\Induser;
use App\Http\Requests\CreateCorpRequest;
use App\Corpuser;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		$request['password'] = bcrypt($request['password']);
		Induser::create($request->all());
		$email = $request['email'];
		return view('pages.professionalDetail', compact('email'));
	}

	public function storeCorp(CreateCorpRequest $request)
	{
		$request['firm_password'] = bcrypt($request['firm_password']);
		Corpuser::create($request->all());
		$email = $request['firm_email_id'];
		return view('pages.firmDetail', compact('email'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = Induser::findOrFail(Auth::id());
		return view('pages.master', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function updateProfessionalDetail(){
		$data = Induser::where('email', '=', Input::get('email'))->first();
		if($data != null){
			$data->education = Input::get('education');
			$data->branch = Input::get('branch');
			$data->prof_category = Input::get('functional');
			$data->experience = Input::get('experience');
			$data->role = Input::get('role');
			$data->working_at = Input::get('working_at');
			$data->state = Input::get('state');
			$data->city = Input::get('city');
			$data->linked_skill = Input::get('skill');
			$data->save();
			return redirect('/login');
		}else{
			return 'some error occured.'+Input::get('email');
		}
	}

	public function updateFirmDetail(){
	  $data = Corpuser::where('firm_email_id', '=', Input::get('firm_email_id'))->first();
	  if($data != null){
	   $data->about_firm = Input::get('aboutfirm');
	   $data->industry = Input::get('industry');
	   $data->operating_since = Input::get('operatingsince');
	   $data->firm_mobile_no = Input::get('phone');
	   $data->firm_address = Input::get('address');
	   $data->state = Input::get('state');
	   $data->city = Input::get('city');
	   $data->website_url = Input::get('website');
	   $data->linked_skill = Input::get('workarea');
	   $data->save();
	   return redirect('/login');
	  }else{
	   return 'some error occured.'+Input::get('email');
	  }
	}

}
