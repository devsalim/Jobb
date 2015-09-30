<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use Auth;
use Redirect;
use App\Groups_users;

class GroupController extends Controller {

	public function __construct()
	{
	    $this->beforeFilter(function() {
	    	if(!Auth::check()){
	        	return redirect('/login');
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

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$title = 'group';
		$groups = Group::where('admin_id', '=', Auth::id())->get();
		return view('pages.group', compact('groups', 'title'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$group = new Group();
		$group->group_name = $request['group_name'];
		$group->admin_id =  Auth::user()->id;
		$group->save();
		return redirect('/group/create');	
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
		$group = Group::findOrFail($id);
		$group->delete();
		return redirect('/group/create');
	}

	public function detail($id)
	{		
		$title = 'group';
		$group = Group::findOrFail($id);		
		$connections=Auth::user()->induser->friends->lists('fname', 'id');
		return view('pages.groupDetail', compact('group', 'title', 'connections'));
	}

	public function addUser(Request $request){
		$title = 'group';
		$group = Group::findOrFail($request['id']);
		$group->users()->sync($request['users']);
		$connections=Auth::user()->induser->friends->lists('fname', 'id');
		return view('pages.groupDetail', compact('group', 'title', 'connections'));
	}

	public function deleteUser(Request $request){
		$title = 'group';
		$groups_users = Groups_users::findOrFail($request['id']);
		$groups_users->delete();
		$group = Group::findOrFail($request['groupid']);
		$connections=Auth::user()->induser->friends->lists('fname', 'id');
		return view('pages.groupDetail', compact('group', 'title', 'connections'));
	}


}
