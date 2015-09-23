<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\CreateConnectionsRequest;
use Illuminate\Support\Facades\Input;
use App\Induser;
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
		$connections=Connections::where('user_id', '=', Auth::id())->with('user')->get();
		return view('pages.connections', compact('connections'));
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
		return redirect('master');
	}

	public function inviteFriend($id)
	{
		$connections = new Connections();
		$connections->user_id=Auth::id();
		$connections->connection_user_id=$id;
		$connections->save();
		return redirect('master');
	}

	public function searchConnections()
	{
		
		$email = Input::get('keywords');
		$users= Induser::where('email', '=', $email)->get();
		// return View::make('pages.searchUsers')->('users',$users);
		return view('pages.searchUsers', compact('users'));	

		 // return $users;
		 
	}


}
