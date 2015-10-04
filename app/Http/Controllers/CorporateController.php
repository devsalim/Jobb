<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use Image;
use App\Corpuser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateCorpRequest;
use App\Http\Requests\CreateImgUploadRequest;

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
		$title = 'profile';
		$user = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
		return view('pages.firm_details', compact('user', 'title'));
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

		return redirect('/login');
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
		$data = Corpuser::where('id', '=', $id)->first();
		if($data != null){
		$data->about_firm = Input::get('about_firm');
		$data->industry = Input::get('industry');
		$data->operating_since = Input::get('operating_since');
		$data->firm_address = Input::get('firm_address');
		$data->state = Input::get('state');
		$data->city = Input::get('city');
		$data->website_url = Input::get('website_url');
		$data->linked_skill = Input::get('linked_skill');
		$data->save();
		return redirect('/corporate/create');
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

	public function basicUpdate(){
		$data = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
		if($data != null){
			$data->firm_name = Input::get('firm_name');
			$data->firm_type = Input::get('firm_type');
			$data->firm_email_id = Input::get('firm_email_id');
			$data->firm_phone = Input::get('firm_phone');
			$data->save();
			return redirect('/corporate/create');
		}
	}

	public function imgUpload(){
		if(Input::file('profile_pic')->isValid()) {
			$oldProfilePic = Corpuser::where('id', '=', Auth::user()->corpuser_id)->pluck('logo_status');
			$destinationPath = 'img/profile/';
			$extension = Input::file('profile_pic')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'.'.$extension;
			$path = $destinationPath.$fileName;
			Input::file('profile_pic')->move($destinationPath, $fileName);
			Image::make($path)->resize(200, 200)->save($path);
			Corpuser::where('id', '=', Auth::user()->corpuser_id)->update(['logo_status' => $fileName]);

			if($oldProfilePic != null){
				\File::delete($destinationPath.$oldProfilePic);
			}

			return redirect('/home');
	    }
	}

}
