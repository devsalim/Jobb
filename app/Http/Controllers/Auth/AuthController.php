<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	protected $redirectTo = 'home';
	protected $loginPath  = 'login';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function postLogin(Request $request)
	{
		$field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    	$request->merge([$field => $request->input('email')]);

    	$credentials = $request->only($field, 'password');
    	$data = [];
    	$data['email_verify'] = 0;
    	$data['mobile_verify'] = 0;
		if($field == 'email'){
	    	$email_verify = User::where('email', '=', $request->input('email'))->pluck('email_verify');
	    	if($email_verify == '1'){
	    		$credentials = array_add($credentials, 'email_verify', '1');
	    		$data['page'] = 'home';
	    		$data['email_verify'] = 1;
	    	}else{
	    		//error - email not verified
	    		$data['email_verify'] = 0;
	    		$data['page'] = 'login';
	    		$data['message'] = 'email not verified';
	    	}
	    }
	    if($field == 'mobile'){
	    	$mobile_verify = User::where('mobile', '=', $request->input('email'))->pluck('mobile_verify');
	    	if($mobile_verify == '1'){
	    		$credentials = array_add($credentials, 'mobile_verify', '1');
	    		$data['page'] = 'home';
	    		$data['mobile_verify'] = 1;
	    	}else{
	    		//error - mobile not verified
	    		$data['mobile_verify'] = 0;
	    		$data['page'] = 'login';
	    		$data['message'] = 'mobile not verified';
	    	}
	    }

    	/*if($field == 'email'){
    		 $credentials = array_add($credentials, 'email_verify', '1');
    	}elseif($field == 'mobile'){
    		 $credentials = array_add($credentials, 'mobile_verify', '1');
    	}*/
		if($request->ajax()){
			if(($data['page'] == 'home') && ($data['email_verify'] == 1 || $data['mobile_verify'] == 1)){
				if ($this->auth->attempt($credentials)){
			        // return $this->redirectPath();
			        $data['message'] = 'login success';
			        return response()->json(['success'=>true,'data'=>$data]);
			    }else{
			    	$data['page'] = 'login';
			    	$data['user'] = 'invalid';
	    			$data['message'] = 'invalid login info';
			    }
			}
		    // return $this->loginPath();
		    return response()->json(['success'=>false,'data'=>$data]);
		}
		/*else{
			if ($this->auth->attempt($credentials)){
		        return redirect()->intended($this->redirectPath());
		    }
		    return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
		}*/

    	$this->validate($request, [
			'email' => 'required', 'password' => 'required',
		]);

	}


}
