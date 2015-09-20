<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use App\Corpuser;
use App\User;
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
		$user = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
		return view('pages.firm_details', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateCorpRequest $request)
	{
		DB::beginTransaction();
		try{
			$corpUser = new Corpuser();
			$corpUser->firm_name = $request['firm_name'];
			$corpUser->firm_email_id = $request['firm_email_id'];
			$corpUser->firm_type = $request['firm_type'];
			$corpUser->save();

			$user = new User();
			$user->name = $request['firm_name'];
			$user->email = $request['firm_email_id'];
			$user->password = bcrypt($request['firm_password']);
			$user->identifier = 2;

			$corpUser->user()->save($user);
		}catch(\Exception $e)
		{
		   DB::rollback();
		   throw $e;
		}

		DB::commit();

		return redirect('login');
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
