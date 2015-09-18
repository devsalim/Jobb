<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Induser;
use App\Corpuser;
use Auth;

class PagesController extends Controller {

	public function index(){
		return View('pages.index');
	}

	public function about(){
		$name = "JobTip";
		return view('pages.about')->with('name', $name);
	}

	public function login(){
		return view('pages.login');
	}

	public function professionalDetail(){
		$data = Request::input('email');
		return view('pages.professionalDetail')->with('email', $data);
	}

	public function firmDetail(){
		$data = Request::input('email');
		return view('pages.firmDetail')->with('email', $data);
	}

	public function master(){
		$user = Induser::where('id', '=', Auth::id())->first();
		return View('pages.master', compact('user'));
	}

	public function home(){
		return view('pages.home');
	}

	public function professionalDetailMain(){
		$user = Induser::where('id', '=', Auth::id())->first();
		return view('pages.professional_page', compact('user'));
	}
<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Induser;
use App\Corpuser;
use Auth;

class PagesController extends Controller {

	public function index(){
		return View('pages.index');
	}

	public function about(){
		$name = "JobTip";
		return view('pages.about')->with('name', $name);
	}

	public function login(){
		return view('pages.login');
	}

	public function professionalDetail(){
		$data = Request::input('email');
		return view('pages.professionalDetail')->with('email', $data);
	}

	public function firmDetail(){
		$data = Request::input('email');
		return view('pages.firmDetail')->with('email', $data);
	}

	public function master(){
		$user = Induser::where('id', '=', Auth::id())->first();
		return View('pages.master', compact('user'));
	}

	public function home(){
		return view('pages.home');
	}

	public function professionalDetailMain(){
		$user = Induser::where('id', '=', Auth::id())->first();
		return view('pages.professional_page', compact('user'));
	}

	public function firmDetailMain(){
		$user = Corpuser::where('id', '=', Auth::id())->first();
		return view('pages.firm_details', compact('user'));
	}

	public function myPost(){
		return view('pages.mypost');
	}

	public function newPost(){
		return view('pages.newpost');
	}

	public function postskill(){
		return view('pages.skillpost');
	}

	public function fillItLater(){
		return redirect('/login');
	}


}

	public function firmDetailMain(){
		$user = Corpuser::where('id', '=', Auth::id())->first();
		return view('pages.firm_details', compact('user'));
	}

	public function myPost(){
		return view('pages.mypost');
	}

	public function newPost(){
		return view('pages.newpost');
	}

	public function fillItLater(){
		return redirect('/login');
	}


}
