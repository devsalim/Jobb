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
		return view('pages.index');
	}

	public function about(){
		$name = "JobTip";
		return view('pages.about')->with('name', $name);
	}

	public function login(){
		if (Auth::check()) {
			return redirect('master');
		}else{
			return view('pages.login');
		}
	}

	public function master(){
		if (Auth::check()) {
			if(Auth::user()->identifier == 1){
				$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
			}else if(Auth::user()->identifier == 2){
				$user = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
			}
			return view('pages.master', compact('user'));
		}else{
			return redirect('login');
		}
	}

	public function home(){
		$posts = Postjob::orderBy('id', 'desc')->with('user')->get();
		return view('pages.home', compact('posts'));
	}

	public function myPost(){
		$posts = Postjob::where('individual_id', '=', Auth::id())->orderBy('id', 'desc')->with('user')->get();
		return view('pages.mypost', compact('posts'));
	}

	public function fillItLater(){
		return redirect('login');
	}

}
