<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
			$connections=Auth::user()->induser->friends->lists('fname', 'id');
			return view('pages.postjob', compact('title', 'skills', 'connections'));
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
		$skillIds = $request['skill_list'];
		// $request['skill_list'] = implode(', ', $request['skill_list']);

		$post = Postjob::create($request->all());
		$post->skills()->attach($skillIds); 

		return redirect("/job/create");
		
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
							->where('user_id', '=', Auth::user()->induser_id)
							->first();
		if($like == null){
			$like = new Postactivity();
			$like->post_id = $request['like'];
			$like->user_id = Auth::user()->induser_id;
			$like->thanks = 1;
			$like->save();
			$likeCount = Postactivity::where('post_id', '=', $request['like'])->sum('thanks');
			return $likeCount;
		}elseif($like != null && $like->thanks == 0){
			$like->thanks = 1;
			$like->save();
			$likeCount = Postactivity::where('post_id', '=', $request['like'])->sum('thanks');
			return $likeCount;
		}elseif($like != null && $like->thanks == 1){
			$like->thanks = 0;
			$like->save();
			$likeCount = Postactivity::where('post_id', '=', $request['like'])->sum('thanks');
			return $likeCount;
		}

	}

	public function postFav(Request $request){
		$fav = Postactivity::where('post_id', '=', $request['fav_post'])
							->where('user_id', '=', Auth::user()->induser_id)
							->first();
		if($fav == null){
			$fav = new Postactivity();
			$fav->post_id = $request['fav_post'];
			$fav->user_id = Auth::user()->induser_id;
			$fav->fav_post = 1;
			$fav->save();
			return "favourite";
		}elseif($fav != null && $fav->fav_post == 0){
			$fav->fav_post = 1;
			$fav->save();
			return "favourite";
		}elseif($fav != null && $fav->fav_post == 1){
			$fav->fav_post = 0;
			$fav->save();
			return "unfavourite";
		}

	}

	public function postApply(Request $request){
		$apply = Postactivity::where('post_id', '=', $request['apply'])
							->where('user_id', '=', Auth::user()->induser_id)
							->first();
		if($apply == null){
			$apply = new Postactivity();
			$apply->post_id = $request['apply'];
			$apply->user_id = Auth::user()->induser_id;
			$apply->apply = 1;
			$apply->save();
			return "applied";
		}elseif($apply != null && $apply->apply == 0){
			$apply->apply = 1;
			$apply->save();
			return "applied";
		}

	}

	public function skillSearch(){
		$term = Input::get('term');
		
		$results = array();
		
		$queries = DB::table('skills')
			->where('name', 'LIKE', '%'.$term.'%')
			->take(5)->get();
		
		foreach ($queries as $query){
		    $results[] = [ 'id' => $query->id, 'value' => $query->name ];
		}
		return Response::json($results);
	}

	public function addNewSkills(){
		if($request->ajax()){
			Skills::create(Input::get('skill'));
			
		}
	}

}
