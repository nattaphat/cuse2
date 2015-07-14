<?php

class RoleController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public $roleObj;

	public function __construct()
	{
		$this->roleObj = new Roles();
	}

	public function showRoleAction()
	{
		//$role = new Roles();
		$per_page = Config::get('nhc/site.perpage') ;
		$roles = $this->roleObj->getAllRole($per_page);
        return View::make('role.role')->with('paginator',$roles);
	}

	public function addRoleAction()
	{
		return View::make('role.addrole');
	}

	public function editRoleAction($id)
	{
		$role = Roles::find($id);
		return View::make('role.editrole')->with('role_result',$role);
	}

	public function editedRoleAction($id)
	{	
		Input::flash();
		$data = Input::all();

		$rules = array(
			'rolename' => array('min:3','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'rolename.min' => 'ชื่อบทบาทจะต้องยาวมากกว่า :min ตัวอักษร',
			'rolename.required' => 'กรุณาระบุชื่อบทบาท',
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$role = Roles::find($id);

			$ck_role = $role->checkRole($data['rolename']);
			if($ck_role)
			{
				$role->role_name = $data['rolename'];
				$role->save();
				return Redirect::to('role')->with('success','บันทึกชื่อบทบาทรหัส: '.$id.' สำเร็จ.');
			}else
			{
				return Redirect::to('role-add')
					->with('warning','มีชื่อบทบาทนี้ในระบบแล้ว');	
			}
		}else{
			// $errors = $validator->messages();
			return Redirect::to('role-edit/'.$id)->withErrors($validator);
		}
	}

	public function delRoleAction($id)
	{
		try
		{
			Roles::where('id','=',$id)->delete();
			RolePolicy::where('role_id','=',$id)->delete();
			RoleUser::where('role_id','=',$id)->delete();

			return Redirect::to('role')->with('success','ลบทิ้งบทบาทรหัส = '.$id.' สำเร็จ.');
		}
		catch (Exception $e)
		{
			return Redirect::to('role')->with( 'warning','Error occur info:'.$e->getMessage() );
		 	//throw new Exception( 'Something really gone wrong', 0, $e);
		}
		
	}

	public function saveRoleAction()
	{
		Input::flash();
		$data = Input::all();
		$rules = array(
			'rolename' => array('min:3','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'rolename.min' => 'ชื่อบทบาทจะต้องยาวมากกว่า :min ตัวอักษร',
			'rolename.required' => 'กรุณาระบุชื่อบทบาท',
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) 
		{

			$role = new Roles();
			$ck_role = $this->roleObj->checkRole($data['rolename']);
			if($ck_role)
			{
				$role->role_name = $data['rolename'];
				$role->save();
				return Redirect::to('role')->with('success','บันทึกสำเร็จ');	
			}else
			{
				return Redirect::to('role-add')
					->with('warning','มีชื่อบทบาทนี้ในระบบแล้ว');	
			}
			
		}else
		{
			// $errors = $validator->messages();
			return Redirect::to('role-add')->withErrors($validator);
		}
	}

	public function roleSearchAction($keyword){
		//$role = new Role();
		$per_page = Config::get('nhc/site.role_perpage') ;
		$role_model = $this->roleObj->getRoleByKeywork($keyword,$per_page);
		if(Request::ajax())
        {

			$html = View::make('role.searchrole')->with('paginator',$role_model);
			return $html;
        }
	}
}