<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Induser;
use App\Corpuser;
use App\Postjob;
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
		if(Auth::user()->identifier == 1){
			$user = Induser::where('id', '=', Auth::id())->first();
		}else if(Auth::user()->identifier == 2){
			$user = Corpuser::where('id', '=', Auth::id())->first();
		}else{
			return redirect('login');
		}
	    
		return View('pages.master', compact('user'));
	}

	public function home(){
		$posts = Postjob::all();
		return view('pages.home', compact('posts'));
	}

	public function myPost(){
		$posts = Postjob::where('individual_id', '=', Auth::id())->get();
		return view('pages.mypost', compact('posts'));
	}

	public function fillItLater(){
		return redirect('login');
	}

}
