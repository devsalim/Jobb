<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Postjob;
use App\Http\Requests\CreatePostskillRequest;
use Auth;
use App\Induser;
use App\Postactivity;
use App\Connections;
use App\User;

class ViewpageController extends Controller {

	public function __construct()
	{
	    $this->beforeFilter(function() {
	    	if(Auth::check()){
	        	if(Auth::user()->identifier != 1) return redirect('/home');
	        } else{
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
		$title = 'indview';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
		$thanks = Postactivity::where('user_id', '=', Auth::user()->induser_id)->sum('thanks');
		$posts = Postjob::where('individual_id', '=', Auth::user()->induser_id)->count('id');
		$links = Connections::where('user_id', '=', Auth::user()->induser_id)->orWhere('connection_user_id', '=', Auth::user()->induser_id)->count('id');
		return view('pages.profile_indview', compact('user', 'thanks', 'posts', 'links', 'title'));
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
		$title = 'indprofile_edit';
		$user = Induser::where('id', '=', Auth::user()->induser_id)->first();
		return view('pages.professional_page', compact('user', 'title'));
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

	// public function posts_view()
	// {
	// 	$title = 'posts_view';
	// 	if (Auth::check()) {
	// 		$title = 'mypost';
	// 		if(Auth::user()->identifier == 1){
	// 			$posts = Postjob::with('induser', 'postActivity', 'postactivity.user')->where('individual_id', '=', Auth::user()->induser_id)->orderBy('id', 'desc')->get();
	// 		}else if(Auth::user()->identifier == 2){
	// 			$posts = Postjob::with('corpuser')->where('corporate_id', '=', Auth::user()->corpuser_id)->orderBy('id', 'desc')->get();
	// 		}
	// 		return view('pages.mypost', compact('posts', 'title'));
	// 	}else{
	// 		return redirect('login');
	// 	}	
	// 	return view('pages.mypost', compact('user', 'title'));
	// }
}
