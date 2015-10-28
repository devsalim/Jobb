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

	public function thanks_view()
	{
		$title = 'thanks_view';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
		
		return view('pages.notification_view', compact('user', 'title'));
	}

	

	public function corp_indView()
	{
		$connectionStatus = 'unknown';
		if(Auth::user()->identifier == 1){
				$title = 'indView';
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

				$connectionPendingStatus = Connections::where('user_id', '=', Auth::user()->induser_id)
										 ->where('connection_user_id', '=', Auth::user()->induser_id)
										 ->first(['status']); 
				$connectionRequestStatus = Connections::where('connection_user_id', '=', Auth::user()->induser_id)
									   ->where('user_id', '=', Auth::user()->induser_id)
									   ->first(['status']);

				// connection status
				$connectionStatus = 'unknown';
				if($connectionPendingStatus != null && $connectionPendingStatus->status == 0){
					$connectionStatus = 'requestsent';
				}
				elseif($connectionPendingStatus != null && $connectionPendingStatus->status == 1){
					$connectionStatus = 'friend';
				}
				elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 0){
					$connectionStatus = 'pendingrequest';
				}
				elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 1){
					$connectionStatus = 'friend';
				}
				return view('pages.profile_indview', compact('user','thanks', 'posts', 'connectionStatus', 'linksCount', 'title'));

			}else if(Auth::user()->identifier == 2){
				$title = 'corpView';
				$user = Corpuser::where('id', '=', Auth::user()->corpuser_id)->first();
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

				$connectionPendingStatus = Connections::where('user_id', '=', Auth::user()->induser_id)
													 ->where('connection_user_id', '=', Auth::user()->induser_id)
													 ->first(['status']); 
				$connectionRequestStatus = Connections::where('connection_user_id', '=', Auth::user()->induser_id)
									   ->where('user_id', '=', Auth::user()->induser_id)
									   ->first(['status']);

				// connection status
				$connectionStatus = 'unknown';
				if($connectionPendingStatus != null && $connectionPendingStatus->status == 0){
					$connectionStatus = 'requestsent';
				}
				elseif($connectionPendingStatus != null && $connectionPendingStatus->status == 1){
					$connectionStatus = 'friend';
				}
				elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 0){
					$connectionStatus = 'pendingrequest';
				}
				elseif($connectionRequestStatus != null && $connectionRequestStatus->status == 1){
					$connectionStatus = 'friend';
				}
				return view('pages.profile_indview', compact('user','thanks', 'posts', 'connectionStatus', 'linksCount', 'title'));

			}

	}

}
