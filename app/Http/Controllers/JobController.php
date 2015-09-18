<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class JobController extends Controller {

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
		return view('pages.postjob');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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

}
