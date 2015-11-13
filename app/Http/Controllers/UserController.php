<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Auth;
use Image;
use App\Induser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\CreateImgUploadRequest;
use Illuminate\Http\Response;

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
		$title = 'profile';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
		return view('pages.professional_page', compact('user', 'title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		if($request->ajax()){
			DB::beginTransaction();
			$vcode = "";
			$otp = "";
			try{
				$indUser = new Induser();
				$indUser->fname = $request['fname'];
				$indUser->lname = $request['lname'];
				$indUser->email = $request['email'];
				$indUser->mobile = $request['mobile'];

				if($request['email'] != null){
					$vcode = 'A'.rand(1111,9999);
					$indUser->email_vcode = $vcode;
				}
				if($request['mobile'] != null){
					$otp = rand(1111,9999);
					$indUser->mobile_otp = $otp;
				}

				$indUser->save();

				$user = new User();
				$user->name = $request['fname'].' '.$request['lname'];
				$user->email = $request['email'];
				$user->mobile = $request['mobile'];
				$user->password = bcrypt($request['password']);
				$user->identifier = 1;

				$indUser->user()->save($user);
			}catch(\Exception $e){
			   DB::rollback();
			   throw $e;
			}
			DB::commit();

			$data = ['page'=>'login','vcode'=>$vcode,'otp'=>$otp];
			return response()->json(['success'=>true,'data'=>$data]);

			// return 'login';
		}else{
			DB::beginTransaction();
			try{
				$indUser = new Induser();
				$indUser->fname = $request['fname'];
				$indUser->lname = $request['lname'];
				$indUser->email = $request['email'];
				$indUser->mobile = $request['mobile'];

				if($request['email'] != null){
					$vcode = 'A'.rand(1111,9999);
					$indUser->email_vcode = $vcode;
				}
				if($request['mobile'] != null){
					$otp = rand(1111,9999);
					$indUser->mobile_otp = $otp;
				}

				$indUser->save();

				$user = new User();
				$user->name = $request['fname'].' '.$request['lname'];
				$user->email = $request['email'];
				$user->mobile = $request['mobile'];
				$user->password = bcrypt($request['password']);
				$user->identifier = 1;

				$indUser->user()->save($user);
			}catch(\Exception $e){
			   DB::rollback();
			   throw $e;
			}
			DB::commit();
			return redirect('/login');
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
		return view('pages.professional_page');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$title = 'profile';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
		return view('pages.professional_page', compact('user', 'title'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data = Induser::where('id', '=', $id)->first();
		if($data != null){
			if(Input::file('resume') != null){
				if(Input::file('resume')->isValid()) {
					$destinationPath = 'resume/';
					$extension = Input::file('resume')->getClientOriginalExtension();
					$fileName = rand(11111,99999).'.'.$extension;
					$path = $destinationPath.$fileName;
					Input::file('resume')->move($destinationPath, $fileName);

				}			
				$data->resume = $fileName;
			}
			$data->education = Input::get('education');
			$data->branch = Input::get('branch');
			$data->prof_category = Input::get('prof_category');
			$data->dob = Input::get('dob');
			$data->gender = Input::get('gender');
			$data->experience = Input::get('experience');
			$data->role = Input::get('role');
			$data->working_at = Input::get('working_at');
			$data->working_status = Input::get('working_status');
			$data->state = Input::get('state');
			$data->city = Input::get('city');
			$data->prefered_location = Input::get('prefered_location');
			$data->prefered_jobtype = Input::get('prefered_jobtype');
			$data->linked_skill = Input::get('linked_skill');
			$data->about_individual = Input::get('about_individual');
			$data->save();
			return redirect('/individual/create');
		}else{
			return 'some error occured.';
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
		$data = Induser::where('id', '=', Auth::user()->induser_id)->first();
		if($data != null){
			$data->fname = Input::get('fname');
			$data->lname = Input::get('lname');
			$data->email = Input::get('email');
			$data->mobile = Input::get('mobile');
			$data->save();
			return redirect('/individual/create');
		}
	}

	public function imgUpload(){
		if(Input::file('profile_pic')->isValid()) {
			$oldProfilePic = Induser::where('id', '=', Auth::user()->induser_id)->pluck('profile_pic');
			$destinationPath = 'img/profile/';
			$extension = Input::file('profile_pic')->getClientOriginalExtension();
			$fileName = rand(11111,99999).'.'.$extension;
			$path = $destinationPath.$fileName;
			Input::file('profile_pic')->move($destinationPath, $fileName);
			Image::make($path)->resize(200, 200)->save($path);
			Induser::where('id', '=', Auth::user()->induser_id)->update(['profile_pic' => $fileName]);

			if($oldProfilePic != null){
				\File::delete($destinationPath.$oldProfilePic);
			}
			return redirect('/home');
	    }
	}

	public function edit_me(){
		$type = Input::get('type');
		return view('pages.mobile_email_modal', compact('type'));
	}

	public function sendOTP(){
		$type = 'mobile-otp';
		$mobile = Input::get('mobile_no');
		$otp = rand(1111,9999);
		$otpEnc = md5($otp);
		return view('pages.verify_email_mobile', compact('mobile', 'otpEnc', 'type', 'otp'));
	}

	public function verifyOTP(){
		$mobile = Input::get('mobile');
		$otp = md5(Input::get('mobile_otp'));
		$otpEnc = Input::get('motpenc');
		if($otp == $otpEnc){
			Induser::where('id', '=', Auth::user()->induser_id)->update(['mobile' => $mobile]);
			Induser::where('id', '=', Auth::user()->induser_id)->update(['mobile_verify' => 1]);
			User::where('induser_id', '=', Auth::user()->induser_id)->update(['mobile' => $mobile]);
			User::where('induser_id', '=', Auth::user()->induser_id)->update(['mobile_verify' => 1]);
			return 'verification-success';
		}else{
			return 'verification-failure';
		}
	}

	public function sendEVC(){
		$type = 'email-verification-code';
		$email = Input::get('new_email');
		$code = 'A'.Auth::user()->induser_id.rand(1111,9999);
		$codeEnc = md5($code);
		return view('pages.verify_email_mobile', compact('email', 'codeEnc', 'type', 'code'));
	}

	public function verifyEVC(){
		$email = Input::get('email');
		$code = md5(Input::get('email_vcode'));
		$codeEnc = Input::get('ecodeenc');
		if($code == $codeEnc){
			Induser::where('id', '=', Auth::user()->induser_id)->update(['email' => $email]);
			Induser::where('id', '=', Auth::user()->induser_id)->update(['email_verify' => 1]);
			User::where('induser_id', '=', Auth::user()->induser_id)->update(['email' => $email]);
			User::where('induser_id', '=', Auth::user()->induser_id)->update(['email_verify' => 1]);
			return 'verification-success';
		}else{
			return 'verification-failure';
		}
	}
		
}
