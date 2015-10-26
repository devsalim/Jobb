<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use App\Induser;
use App\Corpuser;
use App\Postjob;
use App\Postactivity;
use App\Connections;
use App\Follow;
use Auth;
use DB;
use Input;

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
			$posts = Postjob::orderBy('id', 'desc')->with('indUser', 'corpUser', 'postActivity')->paginate(15);

			$links = DB::select('select id from indusers
									where indusers.id in (
											select connections.user_id as id from connections
											where connections.connection_user_id=?
											 and connections.status=1
											union 
											select connections.connection_user_id as id from connections
											where connections.user_id=?
											 and connections.status=1
								)', [Auth::user()->induser_id, Auth::user()->induser_id]);
			$links = collect($links);

			if(Auth::user()->induser_id != null){
				$following = DB::select('select id from corpusers 
										 where corpusers.id in (
											select follows.corporate_id as id from follows
											where follows.individual_id=?
									)', [Auth::user()->induser_id]);
				$following = collect($following);
			}
			if(Auth::user()->corpuser_id != null){
				$following = DB::select('select id from indusers
										 where indusers.id in (
											select follows.individual_id as id from follows
											where follows.corporate_id=?
									)', [Auth::user()->corpuser_id]);
				$following = collect($following);
			}

			return view('pages.home', compact('posts', 'title', 'links', 'following'));
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

	public function notify(){
		$title = 'notification';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();		
		$thanks = Postactivity::with('user', 'post')
						      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
							  ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
							  ->where('postactivities.thanks', '=', 1)
						      ->orderBy('postactivities.id', 'desc')
						      ->take(25)
						      ->get(['postactivities.id','postjobs.unique_id', 'postactivities.thanks', 'postactivities.thanks_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
		return view('pages.notification_view', compact('user', 'thanks', 'title'));
	}
	
	public function profile($utype,$id)
	{		
		$title = 'profile';
		if($utype == 'ind'){
			$user = Induser::findOrFail($id);
			$thanks = Postactivity::with('user', 'post')
							      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
								  ->where('postjobs.individual_id', '=', $id)
								  ->where('postactivities.thanks', '=', 1)
							      ->orderBy('postactivities.id', 'desc')
							      ->sum('postactivities.thanks');
			$posts = Postjob::where('individual_id', '=', $id)->count('id');
			$linksCount = Connections::where('user_id', '=', $id)
								->where('status', '=', 1)
								->orWhere('connection_user_id', '=', $id)
								->where('status', '=', 1)
								->count('id');
		}elseif($utype == 'corp'){
			$user = Corpuser::findOrFail($id);
			$thanks = Postactivity::with('user', 'post')
							      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
								  ->where('postjobs.corporate_id', '=', $id)
								  ->where('postactivities.thanks', '=', 1)
							      ->orderBy('postactivities.id', 'desc')
							      ->sum('postactivities.thanks');
			$posts = Postjob::where('corporate_id', '=', $id)->count('id');
			$linksCount = Follow::where('corporate_id', '=', $id)->count('id');
		}	
		// return $utype;	linkCount
		return view('pages.profile_indview', compact('title','thanks','posts','linksCount','user'));
	}

	public function follow($id){
		$follow = new Follow();
		$follow->corporate_id = $id;
		$follow->individual_id = Auth::user()->induser_id;
		$follow->save();
		return redirect('/home');
	}

	public function unfollow($id){
		$follow = Follow::where('corporate_id', '=', $id)
						->where('individual_id', '=', Auth::user()->induser_id)
						->first();
		$follow->delete();
		return redirect('/home');
	}

	public function followModal(){
		$puid = Input::get('puid');
		$linked = Input::get('linked');
		$utype = Input::get('utype');
		return view('pages.links_follow', compact('puid', 'linked', 'utype'));
	}

	public function homeFilter(){
		if (Auth::check()) {
			$title = 'home';

			$post_type = Input::get('post_type');
			$posted_by = Input::get('posted_by');
			$post_title = Input::get('post_title');
			$city = Input::get('city');
			$prof_category = Input::get('prof_category');
			$experience = Input::get('experience');

			$posts = Postjob::orderBy('id', 'desc')->with('indUser', 'corpUser', 'postActivity');

			if($post_title != null){
				$posts->where('post_title', 'like', '%'.$post_title.'%');
			}
			if($city != null){
				$posts->where('city', 'like', '%'.$city.'%');
			}
			if($prof_category != null){
				$posts->where('prof_category', 'like', '%'.$prof_category.'%');
			}
			if($experience != null){
				$posts->where('min_exp', '=', $experience);
			}
			if(count($post_type) > 0){
				if(in_array("job", $post_type)){
					$posts->where('post_type', '=', $post_type[0]);
				}elseif(in_array("skill", $post_type)){
					$posts->where('post_type', '=', $post_type[0]);
				}
			}
			if(count($posted_by) > 0) {
				if(in_array("individual", $posted_by)) {
				    $posts->where('individual_id', '!=', 0);
				}elseif(in_array("company", $posted_by)) {
				    $posts->where('corporate_id', '!=', 0);
				}
			}

			$posts = $posts->paginate(15);



			$links = DB::select('select id from indusers
									where indusers.id in (
											select connections.user_id as id from connections
											where connections.connection_user_id=?
											 and connections.status=1
											union 
											select connections.connection_user_id as id from connections
											where connections.user_id=?
											 and connections.status=1
								)', [Auth::user()->induser_id, Auth::user()->induser_id]);
			$links = collect($links);

			if(Auth::user()->induser_id != null){
				$following = DB::select('select id from corpusers 
										 where corpusers.id in (
											select follows.corporate_id as id from follows
											where follows.individual_id=?
									)', [Auth::user()->induser_id]);
				$following = collect($following);
			}
			if(Auth::user()->corpuser_id != null){
				$following = DB::select('select id from indusers
										 where indusers.id in (
											select follows.individual_id as id from follows
											where follows.corporate_id=?
									)', [Auth::user()->corpuser_id]);
				$following = collect($following);
			}

			return view('pages.home', compact('posts', 'title', 'links', 'following'));
			// return $posts;
		}else{
			return redirect('login');
		}	
	}

}
