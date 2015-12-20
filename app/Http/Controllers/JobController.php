<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Postjob;
use App\Skills;
use App\Http\Requests\CreatePostjobRequest;
use Auth;
use App\Connections;
use App\Postactivity;
use Input;
use DB;
use Response;
use App\Group;
use App\Induser;
use App\ReportAbuse;
use App\User;
use App\Notification;

class JobController extends Controller {

	public function __construct()
	{
	    $this->beforeFilter(function() {
	    	if(!Auth::check()){
	        	return redirect('login');
	        }
	    });
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$title = 'job';
		$skills = Skills::lists('name', 'id');
		if(Auth::user()->identifier == 1){
			$connections=Induser::whereRaw('indusers.id in (
											select connections.user_id as id from connections
											where connections.connection_user_id=?
											 and connections.status=1
											union 
											select connections.connection_user_id as id from connections
											where connections.user_id=?
											 and connections.status=1
								)', [Auth::user()->induser_id, Auth::user()->induser_id])
							->get(['id','fname'])
							->lists('fname','id');

			$groups = Group::leftjoin('groups_users', 'groups_users.group_id', '=', 'groups.id')					
						->where('groups.admin_id', '=', Auth::user()->induser_id)
						->orWhere('groups_users.user_id', '=', Auth::user()->induser_id)
						->groupBy('groups.id')
						->get(['groups.id as id', 'groups.group_name as name'])
						->lists('name', 'id');

			return view('pages.postjob', compact('title', 'skills', 'connections', 'groups'));
		}else{
			return view('pages.postjob', compact('title', 'skills'));
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreatePostjobRequest $request)
	{
		if(Auth::user()->identifier == 1)
			$request['individual_id'] = Auth::user()->induser_id;
		else
			$request['corporate_id'] = Auth::user()->corpuser_id;
		$request['post_type'] = 'job';

		$skillIds = explode(',', $request['linked_skill_id']);
		unset ($skillIds[count($skillIds)-1]);
		$request['unique_id'] = "J".rand(111,999).rand(111,999);
		$post = Postjob::create($request->all());
		$post->skills()->attach($skillIds); 

		if($request['connections'] != null){
			$taggedUsers = $request['connections'];
			$post->taggeduser()->attach($taggedUsers, array('mode' => 'tagged', 'tag_share_by' => Auth::user()->induser_id));

			$induserIds = implode(', ', $taggedUsers);
			$userIds = User::whereRaw('induser_id in ('.$induserIds.')')->get(['id']);
			foreach($userIds as $r){
			    $to_user = $r->id;
				if($to_user != null){
					$notification = new Notification();
					$notification->from_user = Auth::user()->id;
					$notification->to_user = $to_user;
					$notification->remark = 'has tagged you to post: '.$request['unique_id'];
					$notification->operation = 'job post tagging';
					$notification->save();
				}
			}

		}
		if($request['groups'] != null){
			$taggedGroups = $request['groups'];
			$post->taggedGroup()->attach($taggedGroups, array('mode' => 'tagged', 'tag_share_by' => Auth::user()->induser_id));
		}		

		return redirect("/home");
		// return $taggedUsers;
		// return $userIds;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	public function postLike(Request $request){
		$like = Postactivity::where('post_id', '=', $request['like'])
							->where('user_id', '=', Auth::user()->id)
							->first();
		if($like == null){
			$like = new Postactivity();
			$like->post_id = $request['like'];
			$like->user_id = Auth::user()->id;
			$like->thanks = 1;
			$like->thanks_dtTime = new \DateTime();
			$like->save();
			$likeCount = Postactivity::where('post_id', '=', $request['like'])->sum('thanks');
			return $likeCount;
		}elseif($like != null && $like->thanks == 0){
			$like->thanks = 1;
			$like->thanks_dtTime = new \DateTime();
			$like->save();
			$likeCount = Postactivity::where('post_id', '=', $request['like'])->sum('thanks');
			return $likeCount;
		}elseif($like != null && $like->thanks == 1){
			$like->thanks = 0;
			$like->thanks_dtTime = new \DateTime();
			$like->save();
			$likeCount = Postactivity::where('post_id', '=', $request['like'])->sum('thanks');
			return $likeCount;
		}

	}

	public function postFav(Request $request){
		$fav = Postactivity::where('post_id', '=', $request['fav_post'])
							->where('user_id', '=', Auth::user()->id)
							->first();
		if($fav == null){
			$fav = new Postactivity();
			$fav->post_id = $request['fav_post'];
			$fav->user_id = Auth::user()->id;
			$fav->fav_post = 1;
			$fav->fav_post_dtTime = new \DateTime();
			$fav->save();
			$favCount = Postactivity::where('user_id', '=', Auth::user()->id)->sum('fav_post');
			return $favCount;
		}elseif($fav != null && $fav->fav_post == 0){
			$fav->fav_post = 1;
			$fav->fav_post_dtTime = new \DateTime();
			$fav->save();
			$favCount = Postactivity::where('user_id', '=', Auth::user()->id)->sum('fav_post');
			return $favCount;
		}elseif($fav != null && $fav->fav_post == 1){
			$fav->fav_post = 0;
			$fav->fav_post_dtTime = new \DateTime();
			$fav->save();
			$favCount = Postactivity::where('user_id', '=', Auth::user()->id)->sum('fav_post');
			return $favCount;
		}

	}

	public function postApply(Request $request){
		$apply = Postactivity::where('post_id', '=', $request['apply'])
							->where('user_id', '=', Auth::user()->induser_id)
							->first();
		$post_id = $request['apply'];
		if($apply == null){
			$apply = new Postactivity();
			$apply->post_id = $post_id;
			$apply->user_id = Auth::user()->induser_id;
			$apply->apply = 1;
			$apply->apply_dtTime = new \DateTime();
			$apply->save();

			// Notification entry
			if($post_id != null){
				$to_user = 0;
				$post_user_info = Postjob::where('id', '=', $post_id)->first(['id', 'individual_id', 'corporate_id']);
				if($post_user_info != null){

					if($post_user_info->individual_id != null){
						$to_user = User::where('induser_id', '=', $post_user_info->individual_id)->pluck('id');
					}

					if($post_user_info->corporate_id != null){
						$to_user = User::where('corpuser_id', '=', $post_user_info->corporate_id)->pluck('id');
					}

					$post_unique_id = Postjob::where('id', '=', $post_id)->pluck('unique_id');
					$notification = new Notification();
					$notification->from_user = Auth::user()->id;
					$notification->to_user = $to_user;
					$notification->remark = 'has applied for your post id: '.$post_unique_id;
					$notification->operation = 'job apply';
					$notification->save();

				}

			}			

			return "applied";
		}elseif($apply != null && $apply->apply == 0){
			$apply->apply = 1;
			$apply->apply_dtTime = new \DateTime();
			$apply->save();

			// Notification entry
			if($post_id != null){
				$to_user = 0;
				$post_user_info = Postjob::where('id', '=', $post_id)->first(['id', 'individual_id', 'corporate_id']);
				if($post_user_info != null){

					if($post_user_info->individual_id != null){
						$to_user = User::where('induser_id', '=', $post_user_info->individual_id)->pluck('id');
					}
					
					if($post_user_info->corporate_id != null){
						$to_user = User::where('corpuser_id', '=', $post_user_info->corporate_id)->pluck('id');
					}

					$notification = new Notification();
					$notification->from_user = Auth::user()->id;
					$notification->to_user = $to_user;
					$notification->remark = 'has applied for your post id: '.$post_id;
					$notification->operation = 'job apply';
					$notification->save();

				}

			}

			return "applied";
		}

	}

	public function postContact(Request $request){
		$contact = Postactivity::where('post_id', '=', $request['contact'])
							->where('user_id', '=', Auth::user()->id)
							->first();

		$post_id = $request['contact'];
		$data = [];
		$data['pa'] = $contact;
		$data['post_user_info'] = null;
		if($contact == null){
			$contact = new Postactivity();
			$contact->post_id = $post_id;
			$contact->user_id = Auth::user()->id;
			$contact->contact_view = 1;
			$contact->contact_view_dtTime = new \DateTime();
			$contact->save();

			$data['contact_status'] = 'contacted';
			// Notification entry
			if($post_id != null){
				$to_user = 0;
				$post_user_info = Postjob::where('id', '=', $post_id)->first(['id', 'individual_id', 'corporate_id']);

				$data['post_user_info'] = $post_user_info;
				if($post_user_info != null){

					if($post_user_info->individual_id != null){
						$to_user = User::where('induser_id', '=', $post_user_info->individual_id)->pluck('id');
					}
					
					if($post_user_info->corporate_id != null){
						$to_user = User::where('corpuser_id', '=', $post_user_info->corporate_id)->pluck('id');
					}

					$post_unique_id = Postjob::where('id', '=', $post_id)->pluck('unique_id');
					$notification = new Notification();
					$notification->from_user = Auth::user()->id;
					$notification->to_user = $to_user;
					$notification->remark = 'has contacted for your post id: '.$post_unique_id;
					$notification->operation = 'job contact';
					$notification->save();

					$data['notification_status'] = 'notified';

				}


			}

			// return response()->json(['success'=>true,'data'=>$data]);
		}elseif($contact != null && $contact->contact_view == 0){
			$contact->contact_view = 1;
			$contact->contact_view_dtTime = new \DateTime();
			$contact->save();

			$data['contact_status'] = 'contacted';

			// Notification entry
			if($post_id != null){
				$to_user = 0;
				$post_user_info = Postjob::where('id', '=', $post_id)->first(['id', 'individual_id', 'corporate_id']);
				$data['post_user_info'] = $post_user_info;
				if($post_user_info != null){

					if($post_user_info->individual_id != null){
						$to_user = User::where('induser_id', '=', $post_user_info->individual_id)->pluck('id');
					}
					
					if($post_user_info->corporate_id != null){
						$to_user = User::where('corpuser_id', '=', $post_user_info->corporate_id)->pluck('id');
					}

					$notification = new Notification();
					$notification->from_user = Auth::user()->id;
					$notification->to_user = $to_user;
					$notification->remark = 'has contacted for your post id: '.$post_id;
					$notification->operation = 'job contact';
					$notification->save();

					$data['notification_status'] = 'notified';

				}

			}

			
		}
		return response()->json(['success'=>true,'data'=>$data]);
	}

	public function skillSearch(){
		$term = Input::get('term');
		
		$results = array();
		
		$queries = DB::table('skills')
					 ->where('name', 'LIKE', '%'.$term.'%')
					 ->where('status', '=', 1)
					 ->take(5)->get();
		
		foreach ($queries as $query){
		    $results[] = [ 'id' => $query->id, 'value' => $query->name ];
		}
		return Response::json($results);
	}

	public function addNewSkills(Request $request){
		if($request->ajax()){
			$skill = Skills::create(['name' => $request['name']]);
			return $skill->id;
		}
	}

	public function postExtend(Request $request){
		$post = Postjob::findOrFail($request['post_id']);
		if($post != null && $post->post_duration_extend == 0){
			$post->post_duration = $post->post_duration + $request['post_duration'];
			$post->post_duration_extend = 1;
			$post->save();
			$newDate = $post->created_at->modify('+'.$post->post_duration.' day');
			return redirect('/mypost')
					->withErrors([
						'errors' => 'Duration extended successfully. Post will expire on '.$newDate,
					]);
		}else if($post != null && $post->post_duration_extend == 1){
			return redirect('/mypost')
					->withErrors([
						'post_duration' => 'Duration cannot be extended. You have already extended once.',
					]);
		}

	}

	public function postExtended(Request $request){
		$post = Postjob::findOrFail($request['post_id']);
		if($post != null && $post->post_duration_extend == 0){
			$post->post_extended = $request['post_duration'];
			$post->post_duration_extend = 1;
			$post->post_extended_Dt = new \DateTime();
			$post->save();
			return redirect('/mypost')
					->withErrors([
						'errors' => 'Duration extended successfully.',
					]);
		}else if($post != null && $post->post_duration_extend == 1){
			return redirect('/mypost')
					->withErrors([
						'post_duration' => 'Duration cannot be extended. You have already extended once.',
					]);
		}

	}

	public function postExpire(Request $request){
		$post = Postjob::findOrFail($request['post_id']);
		if($post != null){

			$createdDate = new \DateTime($post->created_at);
			$currentDate = new \DateTime();

			$difference = $currentDate->diff($createdDate);

			$post->post_duration = $difference->format('%d');
			$post->save();
			return redirect('/mypost');
		}
	}

	public function reportAbuse(){
		if(count(Input::get('report-abuse-check')) > 0){
			$reportAbuse = ReportAbuse::where('post_id', '=', Input::get('report_post_id'))
								      ->where('reported_by', '=', Auth::user()->induser_id)
								  	  ->first();
			$report_abuse_for = implode(', ', Input::get('report-abuse-check'));	
			if($reportAbuse != null){
				$reportAbuse->reported_for = $report_abuse_for;
				$reportAbuse->save();
			}else{
				$reportAbuse = new ReportAbuse();
				$reportAbuse->post_id = Input::get('report_post_id');
				$reportAbuse->reported_by = Auth::user()->induser_id;
				$reportAbuse->reported_for = $report_abuse_for;
				$reportAbuse->save();		
			}
		}
		return redirect('/home');
		// return $reportAbuse;
	}

	public function reportAbusePage(){
		$reportAbuses = ReportAbuse::with('user', 'postuser')->get();
		return view('pages.report-abuse', compact('reportAbuses'));
	}

	public function feedbacks(){		
		return view('pages.feedbacks');
	}


	public function sharePost(Request $request){
		
		if($request->ajax()){
			$validator = Validator::make(
					    ['post_id' => $request['share_post_id'], 
					     'links' => $request['share_links'],
					     'groups' => $request['share_groups']
					    ],
					    ['post_id' => 'required', 
					     'links' => 'required_without:groups',
					     'groups' => 'required_without:links|unique:post_group_taggings,post_id,group_id'
					    ],
					    ['links.required_without' => 'Either link or group is required for sharing.',
					     'groups.required_without' => 'Either group or link is required for sharing.',
					     'groups.unique' => 'Either group or link is required for sharing.'
					    ]
					);
			if ($validator->fails()) {
		        return response()->json(array(
										        'success' => false,
										        'errors' => $validator->getMessageBag()->toArray()
										    ), 500);
		    }else{
				$isShared = 0;
				$sharePostId = $request['share_post_id'];
				
				$post = Postjob::findOrFail($sharePostId);
				$data = [];
				if($post!=null){

					// share to link
					if($request['share_links'] != null){
						$taggedUsers = $request['share_links'];
						$post->taggeduser()->attach($taggedUsers, array('mode' => 'shared', 'tag_share_by' => Auth::user()->induser_id));

						$induserIds = implode(', ', $taggedUsers);
						$userIds = User::whereRaw('induser_id in ('.$induserIds.')')->get(['id']);
						foreach($userIds as $r){
						    $to_user = $r->id;
							if($to_user != null){
								$notification = new Notification();
								$notification->from_user = Auth::user()->id;
								$notification->to_user = $to_user;
								$notification->remark = 'has shared post: '.$post->unique_id;
								$notification->operation = 'job post sharing';
								$notification->save();
							}
						}

						$isShared++;
					}

					// share to group
					if($request['share_groups'] != null){
						$taggedGroups = $request['share_groups'];
						$post->taggedGroup()->attach($taggedGroups, array('mode' => 'shared', 'tag_share_by' => Auth::user()->induser_id));
						$isShared++;
					}

					// myactivity update
					if($isShared > 0){
						$postActivity = Postactivity::where('post_id', '=', $sharePostId)
													->where('user_id', '=', Auth::user()->induser_id)
													->first();
						if($postActivity == null){
							$postActivity = new Postactivity();
							$postActivity->post_id = $sharePostId;
							$postActivity->user_id = Auth::user()->induser_id;
							$postActivity->share = 1;
							$postActivity->share_dtTime = new \DateTime();
							$postActivity->save();
						}elseif($postActivity != null && $postActivity->share == 0){
							$postActivity->share = 1;
							$postActivity->share_dtTime = new \DateTime();
							$postActivity->save();
						}

						$sharecount = Postactivity::where('post_id', '=', $sharePostId)->sum('share');
						$data['sharecount'] = $sharecount;

						$data['page'] = 'home';

					}

				}	
				return response()->json(['success'=>true,'data'=>$data]);
				
			}

		}else{
			return redirect("/home");
		}
		
	}



	public function expiringToday(){
		$tz = new \DateTimeZone('Asia/Kolkata');
		$today = \Carbon\Carbon::now($tz)->format('Y-m-d');

		$posts = PostJob::where(DB::raw('date(created_at)'), '=', $today)->get(['id', 'unique_id', 'individual_id', 'corporate_id']);

		foreach ($posts as $post) {
			if($post->individual_id != null){
				$uid = User::where('induser_id', '=', $post->individual_id)->pluck('id');
			}else if($post->corporate_id != null){
				$uid = User::where('corpuser_id', '=', $post->corporate_id)->pluck('id');
			}

			$notification = new Notification();
			$notification->from_user = null;
			$notification->to_user = $uid;			
			$notification->remark = 'Your post - '.$post->unique_id.' getting expired today.';
			$notification->operation = 'job expire';
			$notification->save();


		}

		return $posts;
	}


}
