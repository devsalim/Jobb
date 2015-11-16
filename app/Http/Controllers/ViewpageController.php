<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Postjob;
use App\Http\Requests\CreatePostskillRequest;
use Auth;
use App\Induser;
use App\Corpuser;
use App\Postactivity;
use App\Connections;
use App\User;

class ViewpageController extends Controller {

	// public function __construct()
	// {
	//     $this->beforeFilter(function() {
	//     	if(Auth::check()){
	//         	return redirect('/home');
	//         } else{
	//         	return redirect('login');
	//         }
	//     });
	// }

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
		$title = 'indview';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
		$thanks = Postactivity::with('user', 'post')
						      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
							  ->where('postjobs.individual_id', '=', Auth::user()->induser_id)
							  ->where('postactivities.thanks', '=', 1)
						      ->orderBy('postactivities.id', 'desc')
						      ->sum('postactivities.thanks');
		$posts = Postjob::where('individual_id', '=', Auth::user()->induser_id)->count('id');
		$linksCount = Connections::where('user_id', '=', Auth::user()->induser_id)
								->where('status', '=', 1)
								->orWhere('connection_user_id', '=', Auth::user()->induser_id)
								->where('status', '=', 1)
								->count('id');
		return view('pages.profile_indview', compact('user', 'thanks', 'posts', 'linksCount', 'title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreatePostskillRequest $request)
	{

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

	// Bellow for redirecting to another page from profile_indview page

	public function edit_view()
	{
		if(Auth::user()->identifier == 1){
			$title = 'indprofile_edit';
			$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
			return view('pages.professional_page', compact('user', 'title'));
		}else if(Auth::user()->identifier == 2){
			$title = 'corpprofile_edit';
			$user = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
			return view('pages.firm_details', compact('user', 'title'));
		}
	}

	// public function links_view()
	// {
	// 	$title = 'links_view';
	// 	$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
	// 	return view('pages.connections', compact('user', 'title'));
	// }

	/*public function thanks_view($id)
	{
		$utype='thank';
		$title = 'thanks_view';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
		// $applications = Postactivity::with('user', 'post')
		// 							->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
		// 							->where('postjobs.individual_id', '=', Auth::user()->induser_id)
		// 							->where('postactivities.apply', '=', 1)
		// 							->orderBy('postactivities.id', 'desc')
		// 							->take(25)
		// 							->get(['postactivities.id','postjobs.unique_id', 'postactivities.apply', 'postactivities.apply_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
		$thanks = Postactivity::with('user', 'post')
						      ->join('postjobs', 'postjobs.id', '=', 'postactivities.post_id')
							  ->where('postjobs.individual_id', '=', $id)
							  ->where('postactivities.thanks', '=', 1)
						      ->orderBy('postactivities.id', 'desc')
						      ->take(25)
						      ->get(['postactivities.id','postjobs.unique_id', 'postactivities.thanks', 'postactivities.thanks_dtTime', 'postactivities.user_id', 'postactivities.post_id']);
		// $favourites = Postactivity::with('user')
		// 					      ->where('fav_post', '=', 1)
		// 					      ->where('user_id', '=', Auth::user()->induser_id)
		// 					      ->orderBy('id', 'desc')
		// 				          ->get(['id', 'fav_post', 'fav_post_dtTime', 'user_id', 'post_id']);
		return view('pages.notification_view', compact('user','thanks', 'title', 'utype'));
	}*/

}
