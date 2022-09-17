<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Role;
use App\User;
use App\Department;
use DB;
use Illuminate\Http\Request;
use PDF;

class GoalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		// $employees = User::query()
		// 	->join('designations', 'users.designation_id', '=', 'designations.id')
		// 	->whereBetween('users.access_label', [2, 3])
		// 	->where('users.deletion_status', 0)
		// 	->select('employee_id', 'users.id', 'users.name', 'users.contact_no_one', 'users.created_at', 'users.activation_status', 'designations.designation')
		// 	->orderBy('users.employee_id', 'ASC')
		// 	->get()
		// 	->toArray();
		return view('administrator.goal.manage_goals'
	                                                   );
	}

	public function print() {
		$employees = User::query()
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->whereBetween('users.access_label', [2, 3])
			->where('users.deletion_status', 0)
			->select('users.id', 'users.employee_id', 'users.name', 'users.email', 'users.present_address', 'users.contact_no_one', 'designations.designation')
			->orderBy('users.id', 'DESC')
			->get()
			->toArray();
		return view('administrator.goal.goals_print', compact('goals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$designations = Designation::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('designation', 'ASC')
			->select('id', 'designation')
			->get()
			->toArray();
		$roles = Role::all();

		return view('administrator.goal.add_goal', compact('designations', 'roles')); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//return $request;
		// $url = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

		$goal = request()->validate([
			'goal_id' => 'required|max:250',
			'title' => 'required|max:100',
			'body' => 'nullable|max:100',
			
			'designation_id' => 'required|numeric',
			
			'role' => 'required',
		
		]);

		

		$result->attachRole(Role::where('name', $request->role)->first());

		if (!empty($inserted_id)) {
			return redirect('/people/goals/create')->with('message', 'Add successfully.');
		}
		return redirect('/people/goals/create')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function active($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/people/goals')->with('message', 'Activate successfully.');
		}
		return redirect('/people/goals')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function deactive($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 0]);

		if (!empty($affected_row)) {
			return redirect('/people/goals')->with('message', 'Deactive successfully.');
		}
		return redirect('/people/goals')->with('exception', 'Operation failed !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//$employee_type = User::find($id)->toArray();
		$goal = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();
		
		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();
		$departments = Department::where('deletion_status', 0)
			->select('id', 'department')
			->get();	
		return view('administrator.goal.show_goal', compact('goal', 'designations', 'departments'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function pdf($id) {
		$goal = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();


		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();

		$pdf = PDF::loadView('administrator.goal.pdf', compact('employee',  'designations'));
		$file_name = 'EMP-' . $goal->id . '.pdf';
		return $pdf->download($file_name);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$employee = User::find($id)->toArray();
		$designations = Designation::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('designation', 'ASC')
			->select('id', 'designation')
			->get()
			->toArray();
		$roles = Role::all();
		return view('administrator.goal.edit_goal', compact('goal', 'roles', 'designations'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$goal = User::find($id);

		// $url = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

		request()->validate([
			'goal_id' => 'required|max:250',
			'title' => 'required|max:100',
			'body' => 'nullable|max:100',
			
			'designation_id' => 'required|numeric',
			
			'role' => 'required',
		
		]);

		$goal->egoal_id = $request->get('goal_id');
		$goal->title = $request->get('title');
		$goal->time_bounding = $request->get('time_bounding');
		
		
		$goal->role = $request->get('role');
		$affected_row = $goal->save();

		DB::table('role_user')
			->where('user_id', $id)
			->update(['role_id' => $request->input('role')]);

		if (!empty($affected_row)) {
			return redirect('/people/goals')->with('message', 'Update successfully.');
		}
		return redirect('/people/goals')->with('exception', 'Operation failed !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$affected_row = Goal::where('id', $id)
			->update(['deletion_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/people/goals')->with('message', 'Delete successfully.');
		}
		return redirect('/people/goals')->with('exception', 'Operation failed !');
	}

}
