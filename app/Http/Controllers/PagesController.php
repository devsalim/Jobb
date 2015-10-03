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
			return redirect('/home');
		}else{
			return view('pages.login');
		}
	}

	// public function master(){
	// 	if (Auth::check()) {
	// 		return view('pages.master');
	// 	}else{
	// 		return redirect('login');
	// 	}
	// }

	public function home(){
		if (Auth::check()) {
			$title = 'home';
			$posts = Postjob::orderBy('id', 'desc')->with('indUser', 'corpUser')->get();
			return view('pages.home', compact('posts', 'title'));
		}else{
			return redirect('login');
		}
	}

	public function myPost(){
		if (Auth::check()) {
			$title = 'mypost';
			if(Auth::user()->identifier == 1){
				$posts = Postjob::with('induser')->where('individual_id', '=', Auth::user()->induser_id)->orderBy('id', 'desc')->get();
			}else if(Auth::user()->identifier == 2){
				$posts = Postjob::with('corpuser')->where('corporate_id', '=', Auth::user()->corpuser_id)->orderBy('id', 'desc')->get();
			}
			return view('pages.mypost', compact('posts', 'title'));
		}else{
			return redirect('login');
		}	
		
	}

	public function fillItLater(){
		return redirect('login');
	}

}
