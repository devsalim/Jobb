<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use Auth;
use Redirect;
use App\Groups_users;
use App\Induser;
use Input;
use DB;

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
		$groups = Group::leftjoin('groups_users', 'groups_users.group_id', '=', 'groups.id')
						->where('groups.rowStatus', '=', 0)					
						->where('groups.admin_id', '=', Auth::user()->induser_id)
						->orWhere('groups_users.user_id', '=', Auth::user()->induser_id)
						->where('groups.rowStatus', '=', 0)
						->groupBy('groups.id')
						->get(['groups.id', 'groups.group_name', 'groups.admin_id']);

		// $connections = Auth::user()->induser->friends->lists('fname', 'id');
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
		$group->admin_id =  Auth::user()->induser_id;
		$group->save();
		return redirect('/group');	
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
		$data = Group::where('id', '=', $id)->first();
		if($data != null){
			$data->group_name = Input::get('group_name');
			$data->save();
			return redirect('/group/'.$id);
		}else{
			return 'some error occured.';
		}
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
		$group->rowStatus = 1;
		$group->save();
		return redirect('/group');
	}

	public function detail($id)
	{		
		$title = 'group';
		$users = Induser::leftjoin('groups_users', 'indusers.id', '=', 'groups_users.user_id')
						->leftjoin('groups', 'groups.admin_id', '=', 'indusers.id')
						->join('groups as g', 'g.id', '=', 'groups_users.group_id')
						->where('groups_users.group_id', '=', $id)
						->where('g.id', '=', $id)
						->whereNotNull('groups_users.group_id')
						->orderBy('groups.admin_id', 'desc')
						->groupBy('indusers.id')
						->get(['indusers.id', 
							   'indusers.fname', 
							   'indusers.lname', 
							   'indusers.working_at', 
							   'indusers.city', 
							   'indusers.state', 
							   'indusers.profile_pic',
							   'groups_users.id as groups_users_id',
							   'groups_users.group_id',
							   'g.admin_id'
							]);		
		// $connectionsList = Auth::user()->induser->friends->lists('fname','id');
		$connections = DB::select('select id,fname,lname,working_at,city,state,profile_pic from indusers
									where indusers.id in (

									select connections.user_id as id from connections
									where connections.connection_user_id=?
									 and connections.status=1 
									 and connections.user_id not in (
										select groups_users.user_id from groups_users
										where groups_users.group_id=?)
									union 
									select connections.connection_user_id as id from connections
									where connections.user_id=?
									 and connections.status=1
									 and connections.connection_user_id not in (
										select groups_users.user_id from groups_users
										where groups_users.group_id=?)
								)', [Auth::user()->induser_id, $id, Auth::user()->induser_id, $id]);

		$group = Group::findOrFail($id);
		return view('pages.groupDetail', compact('users', 'title', 'connections', 'group'));
	}

	public function addUser(Request $request){
		$group = Group::findOrFail($request['add_group_id']);
		$group->users()->attach($request['add_user_id']);
		return redirect('/group/'.$request['add_group_id']);
	}

	public function deleteUser(Request $request){
		$groups_users = Groups_users::findOrFail($request['delete_id']);
		$groups_users->delete();
		return redirect('/group/'.$request['delete_group_id']);
	}

	public function leavegroup(Request $request){
		$groups_users = Groups_users::where('user_id', '=', $request['my_id'])->where('group_id', '=', $request['my_group_id']);
		$groups_users->delete();
		return redirect('/group');
	}


}
