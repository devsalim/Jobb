<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Postjob;
// use App\Http\Requests\CreatePostjobRequest;
use Auth;

class SkillController extends Controller {

	public function __construct()
	{
	    $this->beforeFilter(function() {
	    	if(Auth::check()){
	        	if(Auth::user()->identifier != 1) return redirect('master');
	        } else{
	        	return redirect('login');
	        }
	    });
	}

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
		return view('pages.postskill');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Auth::user()->identifier == 1)
			$request['individual_id'] = Auth::user()->induser_id;
		else
			$request['corporate_id'] = Auth::user()->corpuser_id;
		$request['post_type'] = 'skill';
		Postjob::create($request->all());
		return redirect()->intended("master");
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
