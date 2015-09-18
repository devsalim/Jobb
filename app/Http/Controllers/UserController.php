<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Induser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateUserRequest;
<<<<<<< HEAD
=======

>>>>>>> origin/master

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
		$user = Induser::where('id', '=', Auth::id())->first();
		return view('pages.professional_page', compact('user'));
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

		return redirect()->intended("login");
	}

<<<<<<< HEAD
=======
	
>>>>>>> origin/master

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

	public function newPostJob(){
	  $data = Postjob::where('email_id', '=', Input::get('email_id'))->first();
	  if($data != null){
	   $data->post_title = Input::get('post_title');
	   $data->post_compname = Input::get('post_compname');
	   $data->prof_category = Input::get('prof_category');
	   $data->role = Input::get('role');
	   $data->job_detail = Input::get('job_detail');
	   $data->state = Input::get('state');
	   $data->city = Input::get('city');
	   $data->min_exp = Input::get('min_exp');
	   $data->min_sal = Input::get('min_sal');
	   $data->linked_skill = Input::get('linked_skill');
	   $data->post_duration = Input::get('post_duration');
	   $data->alt_emailid = Input::get('alt_emailid');
	   $data->phone = Input::get('phone');
	   $data->alt_phone = Input::get('alt_phone');
	   $data->save();
	   return redirect('/master');
	  }else{
	   return 'some error occured.'+Input::get('email');
	  }
	}
}
