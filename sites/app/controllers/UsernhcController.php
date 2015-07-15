<?php

class UsernhcController extends BaseController {

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

    public $roleInfoObj;

    public function  __construct()
    {
        $this->roleInfoObj = new UserRole();
    }
	public $usertype = array(
          	array('grp_id'=>'3','text'=>'ผู้ใช้งานทั่วไป'),
          	array('grp_id'=>'2','text'=>'ผู้ดูแลระบบ')
          );

	public $acive_status = array(
          array('status'=>'yes','text'=>'เปิดการใช้งาน'),
          array('status'=>'no','text'=>'ปิดการใช้งาน')
          );

	/**
	 * [userList Show list of user nhc]
	 * @return [Array] of user information 
	 */
	public function userList()
	{
		$nhcuser = new Usernhc();
		$per_page = Config::get('nhc/site.perpage') ;
		$datas = $nhcuser->getUsernhc($per_page);
        return View::make('userlist.list')->with('paginator',$datas);
	}

	/**
	 * [userApproval get user information]
	 * @param  [integer] $id [user id]
	 * @return [array]     [user information]
	 */
	public function userInfo($id)
	{
		$nhcuser = new Usernhc();
		$datas = $nhcuser->getUsernhcById($id);
		$role = Roles::all();
		$ur = new RoleUser;
		$role_user = $ur->getRoleById($id);

        return View::make('userlist.approval')
        			->with('user_result',$datas[0])
        			->with('role_data',$role)
        			->with('role_user',$role_user)
        			->with('usertype',$this->usertype)
        			->with('acive_status',$this->acive_status);
	}

	/**
	 * [emailToUser Send Email to user for report user status]
	 * @param  [type] $email  [user email]
	 * @param  [type] $name   [user name]
	 * @param  [type] $status [user status]
	 * @return [type]         [description]
	 */
	public function emailToUser($email,$name,$status,$group,$role)
	{
		if($status =='yes')
			$status = 'เปิดใช้งาน';
		else{
			$status = 'ปิดการใช้งาน';
		}

		$role_obj = new Roles;
		$_role = $role_obj->getRoleName($role);
		$grp_obj = new Usergroup;
		$_grp = $grp_obj->getGrpName($group);

		//var_dump($_grp);exit;

		Mail::send('userlist.email',array(
				"name" => $name,
				"status"=>$status,
				"group"=>$_grp->grp_nameth,
				"role"=>$_role->role_name
			), function($message) use ($email)
		{
		    $message->to($email, 'Admin@NHC')
		    		->subject('Your status @NHC');
		});
	}

	/**
	 * [userApprovalSave save method of user information after approval]
	 * @param  [integer] $id [user id]
	 * @return [none]     [redirect to user list]
	 */
	public function userApprovalSave($id)
	{
		$data = Input::all();
		//var_dump($data);exit;
		$rules = array(
            'user_approve' => 'required',
        );

        $messages = array(
            'user_approve.required' => 'กรุณาระบุสถานะการใช้งาน',
        );

        $validator = Validator::make($data, $rules, $messages);

        //var_dump($validator->messages());exit;
        if ($validator->passes()){
			$usernhc = Usernhc::find($id);
			$usernhc->status = $data['user_approve']; //approve user
			$usernhc->grp_id = $data['user_grp'];//promote user
			$usernhc->save();	


			//set role to user
			// //DB::table('role_user')
			// 		->where('user_id','=',$id)
			// 		->update(array('role_id' => $data['role_approve']));
			
			$roleuser = new RoleUser; 
			$_roleuser = $roleuser->getRoleById($id);
			if(isset($_roleuser)){//if it exist
				RoleUser::where('user_id','=',$id)
						->update(array('role_id' => $data['role_approve']));
			}else{
				$roleuser->role_id = $data['role_approve'];//role id
				$roleuser->user_id = $id;//user id
				$roleuser->save();
			}

			// $rolepolicy = new RolePolicy; 
			// $rolepolicy->role_id = $data['role_approve'];//role id
			// $rolepolicy->policy_id = $id;//user id
			// $roleuser->save();


			if($data['user_approve'] == 'yes'){ //Send email when status is allow to user.
				self::emailToUser(
					$usernhc->email,
					$usernhc->fname.' '.$usernhc->lname,
					$data['user_approve'],// status of approve on/off
					$data['user_grp'], // admin or user
					$data['role_approve']// rbac-role 
				);
			}
			return Redirect::route('userlist');
        }else{
            return Redirect::to('/userlist/approval/'.$id)->withErrors($validator);
        }
		
	}

	/**
	 * [accountInfo description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function accountInfo($id)
	{
		$agency = Agency::all();
		$nhcuser = new Usernhc();
		$datas = $nhcuser->getUsernhcById($id);

		//print_r($datas);exit;
    	return View::make('userlist.account')
    			->with('agency',$agency)
    			->with('userinfo',$datas[0]);
	}

	/**
	 * [saveUpdateAccount description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function saveUpdateAccount($id)
	{
		$data = Input::all();
		//var_dump($data);exit();

		$rules = array(
            'fname' => 'required',
            'agency_id' =>'required', 
            'email' =>'required|email'
        );


        $messages = array(
            'fname.required' => 'กรุณาระบุชื่อผู้ใช้งาน',
            'agency_id.required' => 'กรุณาระหน่วยงานสังกัด',
            'email.required' => 'กรุณารุบุอีเมล์',
            'email.email' => 'รูปแบบอีเมล์ไม่ถูกต้อง',
        );

        /**
         * $attribute = oldpassword field
         * $value = value of oldpassword field
         * $parameters
         */
        Validator::extend('passcheck', function($attribute, $value, $parameters)
	    {
	       $user = Usernhc::where('id', '=' ,Input::get('user_id'))->first();
			if (Hash::check(Input::get('oldpassword'), $user->password)) {
			    // The passwords match...
			    return true;
			}
			else {
			    return false;
			}
	    });

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()){
            
            $usernhc = Usernhc::find($id);
            $usernhc->agency_id = $data['agency_id'];
            $usernhc->grp_id = $data['grp_id'];
            $usernhc->email = $data['email'];
            $usernhc->fname = $data['fname'];
            $usernhc->lname = $data['lname'];
            $usernhc->telno = $data['telno'];
            $usernhc->status = $data['status'];
            $usernhc->save();

            return Redirect::to('/user/account/'.$id)->with('success','ลงทะเบียนสำเร็จ');;
        }else{
            return Redirect::to('/user/account/'.$id)->withErrors($validator);
        }
	}

	/**
	 * [userSecurityFrm description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function userSecurityFrm($id)
	{
		$agency = Agency::all();
		$nhcuser = new Usernhc();
		$datas = $nhcuser->getUsernhcById($id);

    	return View::make('userlist.security')
    			->with('agency',$agency)
    			->with('userinfo',$datas[0]);
	}

	/**
	 * [userChangePassword description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function userChangePassword($id)
	{
		//echo $id;exit;
		$data = Input::all();
		//var_dump($data);exit();

		$rules = array(
            'oldpassword'  => 'passcheck|required',
            'password' =>'required|same:password_confirmation',
            'password_confirmation' => 'required',
        );


        $messages = array(
            'oldpassword.passcheck' => 'รหัสผ่านเดิมไม่ถูกต้อง',
            'oldpassword.required' => 'กรุณาระบุรหัสผ่านเดิม',
            'password.required' => 'กรุณาระบุรหัสผ่าน',
            'password.same' => 'รหัสผ่านไม่ตรงกัน',
            'password_confirmation.required'=>'กรุณาระบุรหัสผ่านอีกครั้ง',
        );

        /**
         * $attribute = oldpassword field
         * $value = value of oldpassword field
         * $parameters
         */
        Validator::extend('passcheck', function($attribute, $value, $parameters)
	    {
	       $user = Usernhc::where('id', '=' ,Input::get('user_id'))->first();
			if (Hash::check(Input::get('oldpassword'), $user->password)) {
			    // The passwords match...
			    return true;
			}
			else {
			    return false;
			}
	    });

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->passes()){
            //echo 'pass';exit;
            $usernhc = Usernhc::find($id);
            $usernhc->password = Hash::make($data['password']);
            $usernhc->save();

            return Redirect::to('/user/account/security/'.$id)->with('success','บันทึกสำเร็จ');;
        }else{
            return Redirect::to('/user/account/security/'.$id)->withErrors($validator);
        }
	}

	/**
	 * [getUserIdByUserName description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public static function getUserIdByUserName($username)
	{
		$userid = Usernhc::where('username','=',$username)->get(array('id'));
		return $userid[0]->id;
	}

	/**
	 * [getRequestDataInfo description]
	 * @return [type] [description]
	 */
	public static function getRequestDataInfo(){
		$reqdata = new RequestData();
		$rs_req = $reqdata->getReqAndAppDataInfoNum();

		return $rs_req;
	}

	/**
	 * [searchAction description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function searchAction($keyword)
	{
		$user = new Usernhc();
		$per_page = Config::get('nhc/site.perpage') ;
		$user_model = $user->getUserByKeywork($keyword,$per_page);
		if(Request::ajax())
        {
			$html = View::make('userlist.searchlist')->with('paginator',$user_model);
			return $html;
        }
	}

	/**
	 * [userDeleteAction description]
	 * @param  [type] $userid [description]
	 * @return [type]         [description]
	 */
	public function userDeleteAction($userid)
	{
		try {
		    Usernhc::find($userid)->delete();
			return Redirect::to('userlist')->with('success','ผู้ใช้งานรหัส '.$userid.' ลบทิ้งสำเร็จ');

		} catch (Exception $e) {
		    return Redirect::to('userlist')
		    			->withErrors(
		    				array(
		    						'Caught exception: '.$e->getMessage()
		    					));
		}
	}

    public function getRole($role_id)
    {
        $rs = $this->roleInfoObj->getRoleInfo($role_id);
        return View::make('userlist.roleinfo')->with('rs',$rs);
    }
}