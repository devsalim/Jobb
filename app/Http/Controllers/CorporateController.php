<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Corpuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateCorpRequest;

class CorporateController extends Controller {

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
		$user = Corpuser::where('id', '=', Auth::id())->first();
		return view('pages.firm_details', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateCorpRequest $request)
	{
		$request['firm_password'] = bcrypt($request['firm_password']);
		Corpuser::create($request->all());
		return redirect('/master');
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
