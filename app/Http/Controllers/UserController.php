<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use App\Induser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller {

	public function __construct()
	{
	    $this->beforeFilter(function() {
	        if(Auth::user()->identifier != 1) return redirect('master'); // home
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
		DB::beginTransaction();
		try{
			$indUser = new Induser();
			$indUser->fname = $request['fname'];
			$indUser->lname = $request['lname'];
			$indUser->email = $request['email'];
			$indUser->mobile = $request['mobile'];
			$indUser->save();

			$user = new User();
			$user->name = $request['fname'].' '.$request['lname'];
			$user->email = $request['email'];
			$user->mobile = $request['mobile'];
			$user->password = bcrypt($request['password']);
			$user->identifier = 1;

			$indUser->user()->save($user);
		}catch(\Exception $e)
		{
		   DB::rollback();
		   throw $e;
		}

		DB::commit();

		return redirect()->intended("login");
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
		$data = Induser::where('id', '=', Auth::id())->first();
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

	public function basicUpdate(){
		$data = Induser::where('id', '=', Auth::id())->first();
		if($data != null){
			$data->fname = Input::get('fname');
			$data->lname = Input::get('lname');
			$data->email = Input::get('email');
			$data->mobile = Input::get('mobile');
			$data->save();
			return redirect('/master');
		}
	}

}
