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
use App\Skills;
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
			return redirect("/home");
		}else{
			return view('pages.login');
		}
	}

	public function home(){
		if (Auth::check()) {
			$title = 'home';
			$skills = Skills::lists('name', 'id');
			$posts = Postjob::orderBy('id', 'desc')->with('indUser', 'corpUser', 'postActivity', 'taggedUser')->paginate(15);

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
			if(Auth::user()->identifier == 1){
				$userSkills = Induser::where('id', '=', Auth::user()->induser_id)->first(['linked_skill']);
				$userSkills = array_map('trim', explode(',', $userSkills->linked_skill));
				unset ($userSkills[count($userSkills)-1]); 
			}
			
			return view('pages.home', compact('posts', 'title', 'links', 'following', 'userSkills', 'skills'));
			// return $userSkills;
		}else{
			return redirect('login');
		}	
	}

	public function myPost(){
		if (Auth::check()) {
			$title = 'mypost';
			if(Auth::user()->identifier == 1){
				$posts = Postjob::with('induser', 'postActivity', 'postactivity.user')
								->where('individual_id', '=', Auth::user()->induser_id)
								->orderBy('id', 'desc')->get();
				$myActivities = DB::select('(select pa.id,pa.user_id,pa.post_id,"Thanks" as identifier,pa.thanks as activity, pa.thanks_dtTime as time, pj.post_title, pj.post_compname
										from postactivities pa 
										join postjobs pj on pj.id = pa.post_id
										where pa.user_id=? and pa.thanks = 1)
										union
										(select pa.id,pa.user_id,pa.post_id,"Applied" as identifier,pa.apply as activity, pa.apply_dtTime as time, pj.post_title, pj.post_compname
										from postactivities pa 
										join postjobs pj on pj.id = pa.post_id
										where pa.user_id=? and pa.apply = 1)
										union
										(select pa.id,pa.user_id,pa.post_id,"Contacted" as identifier,pa.contact_view as activity,pa.contact_view_dtTime as time, pj.post_title, pj.post_compname
										from postactivities pa 
										join postjobs pj on pj.id = pa.post_id
										where pa.user_id=? and pa.contact_view = 1)
										order by time desc', [1,1,1]);
				$myActivities = collect($myActivities);
				// return $myActivities;
			}else if(Auth::user()->identifier == 2){
				$posts = Postjob::with('corpuser')->where('corporate_id', '=', Auth::user()->corpuser_id)->orderBy('id', 'desc')->get();
			}
			return view('pages.mypost', compact('posts', 'title', 'myActivities'));
		}else{
			return redirect('login');
		}	
		
	}

	public function fillItLater(){
		return redirect('login');
	}

  public function notification($utype){
        $title = 'notify_view';
        $user = Induser::where('id', '=', Auth::user()->induser_id)->first();
        if($utype == 'app'){
            $applications = Postactivity::with('user', 'post')
                                        ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
                                        ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
                                        ->where('postactivities.apply', '=', 1)
                                        ->orderBy('postactivities.id', 'desc')
                                        ->take(25)
                                        ->get(['postactivities.id','postjobs.unique_id', 'postactivities.apply', 'postactivities.apply_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
        }elseif($utype == 'thank'){
            $thanks = Postactivity::with('user', 'post')
                                  ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
                                  ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
                                  ->where('postactivities.thanks', '=', 1)
                                  ->orderBy('postactivities.id', 'desc')
                                  ->take(25)
                                  ->get(['postactivities.id','postjobs.unique_id', 'postactivities.thanks', 'postactivities.thanks_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
        }elseif($utype == 'fav'){
            $favourites = Postactivity::with('user')
                                      ->where('fav_post', '=', 1)
                                      ->where('user_id', '=', Auth::user()->induser_id)
                                      ->orderBy('id', 'desc')
                                      ->get(['id', 'fav_post', 'fav_post_dtTime', 'user_id', 'post_id']);
        }
        return view('pages.notification_view', compact('user', 'applications', 'thanks', 'favourites', 'title', 'utype'));
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
			$connectionPendingStatus = Connections::where('user_id', '=', Auth::user()->induser_id)
												  ->where('connection_user_id', '=', $id)
												  ->first(['status']);
			$connectionRequestStatus = Connections::where('connection_user_id', '=', Auth::user()->induser_id)
												  ->where('user_id', '=', $id)
												  ->first(['status']);

			// connection status
			$connectionStatus = 'add';
			$connectionId = 'unknown';
			if($connectionPendingStatus != null && $connectionPendingStatus->status == 0){
				$connectionStatus = 'requestsent';
			}
			elseif($connectionPendingStatus != null && $connectionPendingStatus->status == 1){
				$connectionStatus = 'friend';
			}
			elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 0){
				$connectionStatus = 'pendingrequest';
				$connectionId = $connectionRequestStatus->id;
			}
			elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 1){
				$connectionStatus = 'friend';
			}

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
			$followCount = Follow::where('corporate_id', '=', $id)
								->where('status', '=', 1)
								->orWhere('individual_id', '=', $id)
								->where('status', '=', 1)
								->count('id');
			$connectionStatus = 'unknown';
			$followStatus = Follow::where('individual_id', '=', Auth::user()->induser_id)->first();
			if($followStatus != null){
                $connectionStatus = 'following';
                $connectionId = $followStatus->id;
            }
		}	
		return view('pages.profile_indview', compact('title','thanks','posts','linksCount','user','connectionStatus','utype','connectionId', 'followCount'));
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
			$time_for = Input::get('time_for');
			$unique_id = Input::get('unique_id');
			$role = Input::get('role');

			$posts = Postjob::orderBy('id', 'desc')->with('indUser', 'corpUser', 'postActivity');

			if($role != null){
				$posts->where('role', 'like', '%'.$role.'%');
			}
			if($unique_id != null){
				$posts->where('unique_id', 'like', '%'.$unique_id.'%');
			}
			if($post_title != null){
				$posts->where('post_title', 'like', '%'.$post_title.'%');
			}
			if($city != null){
				$pattern = '/\s*,\s*/';
				$replace = ',';
				$city = preg_replace($pattern, $replace, $city);
				$cityArray = explode(',', $city);
				$posts->whereIn('city', $cityArray);
			}
			if($prof_category != null){
				$posts->where('prof_category', 'like', '%'.$prof_category.'%');
			}
			if($experience != null){
				$posts->whereRaw("$experience between min_exp and max_exp");
			}
			if($time_for != null){
				$posts->where('time_for', '=', $time_for);
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
			if(Auth::user()->identifier == 1){
				$userSkills = Induser::where('id', '=', Auth::user()->induser_id)->first(['linked_skill']);
				$userSkills = array_map('trim', explode(',', $userSkills->linked_skill));
				unset ($userSkills[count($userSkills)-1]); 
			}
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

			return view('pages.home', compact('posts', 'title', 'links', 'following', 'userSkills'));
			// return $posts;
		}else{
			return redirect('login');
		}	
	}

	public function searchProfile(){
		if (Auth::check()) {
			$title = 'Profile search';

			$city = Input::get('city');
			$name = Input::get('name');
			$role = Input::get('role');
			$category = Input::get('category');
			$working_at = Input::get('working_at');
			$mobile = Input::get('mobile');

			$type = Input::get('type');
			if($type == 'people'){
				$users = Induser::orderBy('id', 'desc');

				if($name != null){
					$users->where('fname', 'like', '%'.$name.'%')->orWhere('lname', 'like', '%'.$name.'%')->orWhere('email', '=', $name);
				}
				if($city != null){
					$pattern = '/\s*,\s*/';
					$replace = ',';
					$city = preg_replace($pattern, $replace, $city);
					$cityArray = explode(',', $city);
					$users->whereIn('city', $cityArray);
				}
				if($role != null){
					$users->where('role', 'like', '%'.$role.'%');
				}
				if($category != null){
					$users->where('prof_category', 'like', '%'.$category.'%');
				}
				if($working_at != null){
					$users->where('working_at', 'like', '%'.$working_at.'%');
				}
				if($mobile != null){
					$users->where('mobile', 'like', '%'.$mobile.'%');
				}
				$users = $users->paginate(15);

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
				return view('pages.profileSearch', compact('users', 'title', 'links', 'type'));
			}elseif($type == 'company'){
				$users = Corpuser::orderBy('id', 'desc');

				if($name != null){
					$users->where('firm_name', 'like', '%'.$name.'%')->orWhere('firm_email_id', '=', $name);
				}
				if($city != null){
					$pattern = '/\s*,\s*/';
					$replace = ',';
					$city = preg_replace($pattern, $replace, $city);
					$cityArray = explode(',', $city);
					$users->whereIn('city', $cityArray);
				}
				if($role != null){
					$users->where('role', 'like', '%'.$role.'%');
				}
				if($category != null){
					$users->where('prof_category', 'like', '%'.$category.'%');
				}
				if($mobile != null){
					$users->where('firm_phone', 'like', '%'.$mobile.'%');
				}
				$users = $users->paginate(15);

				$following = DB::select('select id from corpusers 
										 where corpusers.id in (
											select follows.corporate_id as id from follows
											where follows.individual_id=?
									)', [Auth::user()->induser_id]);
				$following = collect($following);

				return view('pages.profileSearch', compact('users', 'title', 'following', 'type'));
			}
		
		}
	}


	public function post(){
		if (Auth::check()) {
			$post = Postjob::with('indUser', 'corpUser', 'postActivity')->where('id', '=', Input::get('post_id'))->first();

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

			return view('pages.singlepost', compact('post', 'links', 'following'));
			// return $post;
		}else{
			return redirect('login');
		}	
	}

	public function matching()
	{
		$posts = Postjob::with('indUser', 'corpUser', 'postActivity')->where('id', '=', Auth::user()->induser_id)->first();
		return view('pages.matching_criteria',compact('posts'));
	}

}
