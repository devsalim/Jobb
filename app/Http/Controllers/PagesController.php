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

	public function master(){
	    $user = Induser::where('id', '=', Auth::id())->first();
		return View('pages.master', compact('user'));
	}

	public function home(){
		return view('pages.home');
	}

	public function myPost(){
		return view('pages.mypost');
	}

<<<<<<< HEAD
=======
	

>>>>>>> origin/master
	public function fillItLater(){
		return redirect('/login');
	}


}
