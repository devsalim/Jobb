<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Induser;
use App\Corpuser;
use App\Postjob;
use App\Postactivity;
use App\Connections;
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

	public function home(){
		if (Auth::check()) {
			$title = 'home';
			$posts = Postjob::orderBy('id', 'desc')->with('indUser', 'corpUser', 'postActivity')->get();
			return view('pages.home', compact('posts', 'title'));
			// return $posts;
		}else{
			return redirect('login');
		}	
	}

	public function myPost(){
		if (Auth::check()) {
			$title = 'mypost';
			if(Auth::user()->identifier == 1){
				$posts = Postjob::with('induser', 'postActivity', 'postactivity.user')->where('individual_id', '=', Auth::user()->induser_id)->orderBy('id', 'desc')->get();
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

	public function notification(){
		$title = 'notify_view';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
		$applications = Postactivity::with('user', 'post')
									->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
									->where('postjobs.individual_id', '=', Auth::user()->induser_id)
									->where('postactivities.apply', '=', 1)
									->orderBy('postactivities.id', 'desc')
									->take(25)
									->get(['postactivities.id','postjobs.unique_id', 'postactivities.apply', 'postactivities.apply_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
		$thanks = Postactivity::with('user', 'post')
						      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
							  ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
							  ->where('postactivities.thanks', '=', 1)
						      ->orderBy('postactivities.id', 'desc')
						      ->take(25)
						      ->get(['postactivities.id','postjobs.unique_id', 'postactivities.thanks', 'postactivities.thanks_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
		$favourites = Postactivity::with('user')
							      ->where('fav_post', '=', 1)
							      ->where('user_id', '=', Auth::user()->induser_id)
							      ->orderBy('id', 'desc')
						          ->get(['id', 'fav_post', 'fav_post_dtTime', 'user_id', 'post_id']);
	
		return view('pages.notification_view', compact('user', 'applications', 'thanks', 'favourites', 'title'));
	}
	
	public function profile($id)
	{		
		$title = 'profile';
		$user = Induser::findOrFail($id);
		$thanks = Postactivity::with('user', 'post')
						      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
							  ->where('postjobs.individual_id', '=', $id)
							  ->where('postactivities.thanks', '=', 1)
						      ->orderBy('postactivities.id', 'desc')
						      ->sum('thanks');
		$posts = Postjob::where('individual_id', '=', $id)->count('id');
		$links = Connections::where('user_id', '=', $id)->orWhere('connection_user_id', '=', $id)->count('id');
		return view('pages.profile_indview', compact('title','thanks','posts','links','user'));
	}
}
