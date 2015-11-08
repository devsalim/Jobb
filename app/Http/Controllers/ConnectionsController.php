<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateConnectionsRequest;
use Illuminate\Support\Facades\Input;
use App\Induser;
use App\Corpuser;
use App\Connections;
use App\Follow;
use Auth;
use DB;

class ConnectionsController extends Controller {

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
		$title = 'connections';
		$linksCount = Connections::where('user_id', '=', Auth::user()->induser_id)
								 ->where('status', '=', 1)
								 ->orWhere('connection_user_id', '=', Auth::user()->induser_id)
								 ->where('status', '=', 1)
								 ->count('id');
		$linkrequestCount = Connections::where('connection_user_id', '=', Auth::user()->induser_id)
									   ->where('status', '=', 0)
									   ->count('id');	
		$followCount = Follow::Where('individual_id', '=', Auth::user()->induser_id)
								->count('id');
		$follonewCount = Follow::Where('corporate_id', '=', Auth::user()->induser_id)
								 ->count('id');
		$linkFollow = Corpuser::leftjoin('follows', 'corpusers.id', '=', 'follows.corporate_id')
								->where('follows.individual_id', '=', Auth::user()->induser_id)
								->get(['corpusers.id',
									   'corpusers.firm_name',
									   'corpusers.firm_type',
									   'corpusers.emp_count',
									   'corpusers.logo_status',
									   'corpusers.operating_since',
									   'corpusers.city', 
									   'follows.corporate_id',
									   'follows.individual_id']);
		return view('pages.connections', compact('title', 'linkFollow', 'linksCount', 'linkrequestCount', 'followCount', 'follonewCount'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
		$connections = Connections::findOrFail($id);
		$connections->delete();
		return redirect('/connections/create');
	}

	public function inviteFriend($id)
	{
		$connections = new Connections();
		$connections->user_id=Auth::user()->induser_id;
		$connections->connection_user_id=$id;
		$connections->save();
		return redirect('/connections/create');
	}

	public function searchConnections()
	{
		$keywords = Input::get('keywords');
		$users = Induser::where('email', '=', $keywords)
						->where('id', '<>', Auth::user()->induser_id)
						->orWhere('fname', 'like', '%'.$keywords.'%')
						->where('id', '<>', Auth::user()->induser_id)
						->orWhere('lname', 'like', '%'.$keywords.'%')
						->where('id', '<>', Auth::user()->induser_id)
						->orWhere('working_at', 'like', '%'.$keywords.'%')
						->where('id', '<>', Auth::user()->induser_id)
					    ->get();
		$corps = Corpuser::where('firm_email_id', '=', $keywords)
						->where('id', '<>', Auth::user()->induser_id)
						->orWhere('firm_name', 'like', '%'.$keywords.'%')
						->where('id', '<>', Auth::user()->induser_id)
						->orWhere('firm_type', 'like', '%'.$keywords.'%')
						->where('id', '<>', Auth::user()->induser_id)
						->orWhere('city', 'like', '%'.$keywords.'%')
						->where('id', '<>', Auth::user()->induser_id)
					    ->get();

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

		$follows = DB::select('select id from corpusers
									where corpusers.id in (
											select follows.individual_id as id from follows
											where follows.corporate_id=?
											 and follows.status=1
											union 
											select follows.corporate_id as id from follows
											where follows.individual_id=?
											 and follows.status=1
								)', [Auth::user()->induser_id, Auth::user()->corpuser_id]);
		$follows = collect($follows);

		return view('pages.searchUsers', compact('users', 'links', 'corps', 'follows'));
	}

	public function response($id)
	{
		if(Input::get('action') == 'accept'){
			Connections::where('id', '=', $id)->update(['status' => 1]);
		}elseif(Input::get('action') == 'reject'){
			Connections::where('id', '=', $id)->update(['status' => 2]);
		}
		return redirect('/connections/create');
	}

	public function newLink($id)
	{
		$connections = new Connections();
		$connections->user_id=Auth::user()->induser_id;
		$connections->connection_user_id=$id;
		$connections->save();
		return redirect('/home');
	}

	public function removeLink($id){
		$connections = Connections::where('user_id', '=', $id)
							      ->where('connection_user_id', '=', Auth::user()->induser_id)
							      ->orWhere('user_id', '=', Auth::user()->induser_id)
							      ->where('connection_user_id', '=', $id)
							      ->first();
		$connections->delete();
		return redirect('/home');
	}

	public function friendLink($id)
	{
		$title = 'friendLink';
		$linkFollow = Corpuser::leftjoin('follows', 'corpusers.id', '=', 'follows.corporate_id')
								->where('follows.individual_id', '=', $id)
								->get(['corpusers.id',
									   'corpusers.firm_name',
									   'corpusers.logo_status',
									   'corpusers.operating_since',
									   'corpusers.city', 
									   'follows.corporate_id',
									   'follows.individual_id']);
		$followCount = Follow::Where('individual_id', '=', $id)
								->where('status', '=', 1)
								->count('id');						
		$connections = DB::select('select id,fname,lname,working_at,city,state,profile_pic from indusers
									where indusers.id in (

									select connections.user_id as id from connections
									where connections.connection_user_id=?
									 and connections.status=1 
									union 
									select connections.connection_user_id as id from connections
									where connections.user_id=?
									 and connections.status=1
								)', [$id, $id]);
		$linksCount = Connections::where('user_id', '=', $id)
								 ->where('status', '=', 1)
								 ->orWhere('connection_user_id', '=', $id)
								 ->where('status', '=', 1)
								 ->count('id');
		return view('pages.friendlink', compact('title', 'linkFollow', 'connections', 'linksCount', 'followCount'));
	}
}
