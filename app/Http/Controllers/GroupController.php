<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use Auth;
use Redirect;
use App\Groups_users;
use App\Induser;

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
		$title = 'group';
		$groups = Group::with('users')
					->join('groups_users', 'groups_users.group_id', '=', 'groups.id')
					->where('groups_users.user_id', '=', Auth::user()->induser_id)
					->orWhere('groups.admin_id', '=', Auth::user()->induser_id)
					->groupBy('groups.id')
					->get(['groups.id', 'groups.group_name']);
		return view('pages.group', compact('groups', 'title'));
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
		$users = Induser::join('groups_users', 'groups_users.user_id', '=', 'indusers.id')
						->join('groups', 'groups.id', '=', 'groups_users.group_id')
						->get(['indusers.id', 
							   'indusers.fname', 
							   'indusers.lname', 
							   'indusers.working_at', 
							   'indusers.city', 
							   'indusers.state', 
							   'indusers.profile_pic',
							   'groups.id As group_id',
							   'groups.group_name',
							   'groups.admin_id'
							]);		
		return view('pages.group_create', compact('groups', 'title', 'users'));
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
		$users = Induser::join('groups_users', 'groups_users.user_id', '=', 'indusers.id')
						->join('groups', 'groups.id', '=', 'groups_users.group_id')
						->where('groups_users.group_id', '=', $id)
						->get(['indusers.id', 
							   'indusers.fname', 
							   'indusers.lname', 
							   'indusers.working_at', 
							   'indusers.city', 
							   'indusers.state', 
							   'indusers.profile_pic',
							   'groups.id As group_id',
							   'groups.group_name',
							   'groups.admin_id',
							   'groups_users.id as groups_users_id'
							]);		
		$connections=Auth::user()->induser->friends->lists('fname', 'id');
		return view('pages.groupDetail', compact('users', 'title', 'connections'));
					// return $users;
	}

	public function addUser(Request $request){
		$group = Group::findOrFail($request['id']);
		$group->users()->attach($request['users']);
		return redirect('/group/'.$request['id']);
	}

	public function deleteUser(Request $request){
		$groups_users = Groups_users::findOrFail($request['id']);
		$groups_users->delete();
		return redirect('/group/'.$request['groupid']);
	}


}
