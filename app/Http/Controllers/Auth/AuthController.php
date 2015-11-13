<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

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
    	if($field == 'email'){
    		 $credentials = array_add($credentials, 'email_verify', '1');
    	}elseif($field == 'mobile'){
    		 $credentials = array_add($credentials, 'mobile_verify', '1');
    	}
		if($request->ajax()){
			if ($this->auth->attempt($credentials))
		    {
		        return $this->redirectPath();
		    }
		    return $this->loginPath();
		}else{
			if ($this->auth->attempt($credentials))
		    {
		        return redirect()->intended($this->redirectPath());
		    }
		    return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
		}

    	$this->validate($request, [
			'email' => 'required', 'password' => 'required',
		]);

	}


}
