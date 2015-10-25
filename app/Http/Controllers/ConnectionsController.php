<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateConnectionsRequest;
use Illuminate\Support\Facades\Input;
use App\Induser;
use App\Corpuser;
use App\Connections;
use Auth;

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
		$linkrequestCount = Connections::where('user_id', '=', Auth::user()->induser_id)
									   ->where('status', '=', 0)
									   ->orWhere('connection_user_id', '=', Auth::user()->induser_id)
									   ->where('status', '=', 0)
									   ->count('id');		
		$linkFollow = Corpuser::leftjoin('follows', 'corpusers.id', '=', 'follows.corporate_id')
								->where('follows.individual_id', '=', Auth::user()->induser_id)
								->get(['corpusers.id',
									   'corpusers.firm_name',
									   'corpusers.logo_status',
									   'corpusers.operating_since',
									   'corpusers.city', 
									   'follows.corporate_id',
									   'follows.individual_id']);
		return view('pages.connections', compact('title', 'linkFollow', 'linksCount', 'linkrequestCount'));
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
		return view('pages.searchUsers', compact('users'));
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

}
