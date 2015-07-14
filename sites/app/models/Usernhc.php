<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usernhc extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usernhc';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		 $this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * [getAllUser list of nhc user]
	 * @param  [integer] $perPage set show result per page
	 * @param  [integer] $id Usernhc id for fect information
	 * @return [array] 	$data Array of user
	 */
	public function getUsernhc($perPage)
	{	
		// return DB::table('usernhc')
		// ->join('agency','usernhc.agency_id','=','agency.id')
		// ->join('ministry2','agency.ministry_id','=','ministry2.ministry_id')	
		// ->orderBy('user_id', 'desc')
		// ->select('usernhc.id as user_id',
		// 	'usernhc.status as user_status',
		// 	'usernhc.fname',
		// 	'usernhc.lname',
		// 	'usernhc.email',
		// 	'usernhc.grp_id',
		// 	'usernhc.created_at',
		// 	'agency.id as agency_id',
		// 	'agency.tname as agency_name',
		// 	'agency.code',
		// 	'ministry2.ministry_id',
		// 	'ministry2.full_name',
		// 	'ministry2.short_name'
		// 	)
	 // 	->paginate($perPage);
		if($perPage == 'no')
		{
			return DB::table('v_user_info')
			->orderBy('fname', 'asc')
		 	->get();
		}else
		{
			return DB::table('v_user_info')
			->orderBy('fname', 'asc')
		 	->paginate($perPage);
		}
	 	
	}

	/**
	 * [getUsernhcById return user's information by pass user id]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getUsernhcById($id)
	{
		$rs =  DB::table('v_user_info')
				->where('user_id','=',$id)
			 	->get();
		//var_dump($rs);exit;
		return $rs;
	}


	/**
	 * [getUsernhcById return user's information by pass user id]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getUsernhcPrivacyById($id)
	{
		$rs =  DB::table('v_user_info_privacy')
				->where('user_id','=',$id)
			 	->get();
		//var_dump($rs);exit;
		return $rs;
	}

	/**
	 * [getRoleName get Role information by user id]
	 * @return [array] [collection of role]
	 */
	public static function getRoleName()
	{
		$user_id = Auth::getUser()->id;

		$rs =  DB::table('role_user')
			->join('roles','role_user.role_id','=','roles.id')
			->where('role_user.user_id','=',$user_id)
			->select(
				'role_user.user_id',
				'role_user.role_id',
				'roles.role_name'
				)
		 	->get();
		return $rs[0];
	}

	/**
	 * [getUserGroupName get group name by user id]
	 * @return [array] [collection of group]
	 */
	public static function getUserGroupName()
	{
		$user_id = Auth::getUser()->id;

		$rs =  DB::table('usernhc')
			->join('usergroup','usernhc.grp_id','=','usergroup.id')
			->where('usernhc.id','=',$user_id)
			->select(
				'usergroup.id',
				'usergroup.grp_name',
				'usergroup.grp_nameth'
				)
		 	->get();
		return $rs[0];
	}

	/**
	 * [getAllRoleByUser return all user in system whit role name]
	 * @param  [integer] $rold_id [description]
	 * @return [array] [collection data]
	 */
	public static function getRoleById($role_id)
	{
		$perPage = Config::get('nhc/site.policy_perpage') ;
		// $rs =  DB::table('role')
		// 	->join('role_user','role_user.role_id','=','role.id')
		// 	->join('usernhc','usernhc.id','=','role_user.user_id')
		// 	->join('agency','agency.id','=','usernhc.agency_id')
		// 	->join('usergroup','usernhc.grp_id','=','usergroup.id')
		// 	->join('ministry2','agency.ministry_id','=','ministry2.ministry_id')
		// 	->where('role.id','=',$role_id)
		// 	->select(
		// 		'usernhc.id as user_id',
		// 		'usernhc.fname',
		// 		'usernhc.lname',
		// 		'usernhc.created_at',
		// 		'usernhc.status as user_status',
		// 		'usergroup.grp_name',
		// 		'usergroup.id as grp_id',
		// 		'agency.tname as agency_name',
		// 		'ministry2.full_name',
		// 		'ministry2.short_name',
		// 		'role.id',
		// 		'role.role_name'
		// 		)
		//  	->paginate($perPage);

	 	$rs =  DB::table('v_user_info')
				->where('role_id','=',$role_id)
			 	->paginate($perPage);

		return $rs;
	}

	/**
	 * [getAllDataByUser return all agegncy's data in system with data name]
	 * @return [type] [description]
	 */
	public static function getAllDataByUser()
	{

	}

	/**
	 * [checkUserByEmail In case of user reset password this function will check that email
	 * user provide it exist in database or not]
	 * @param  [type] $email [description]
	 * @return [type]        [description]
	 */
	public function checkUserByEmail($email)
	{
		$rs = Usernhc::where('email','=',$email)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? true : false;
		}
	}

	/**
	 * [checkUsername check username when user register that username is exist in system or not]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function checkUsername($username)
	{
		$rs = Usernhc::where('username','=',$username)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? true : false;
		}
	}

	/**
	 * [getUserIdByUserName description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function getUserIdByUserName($username)
	{
		$rs = Usernhc::where('username','=',$username)->get(array('id'));
		return $rs[0]['id'];
	}	


	public function getUserByKeywork($keyword,$perPage)
	{
		if($keyword != 'all'){
			$userlist = DB::table('v_user_info')
						->whereRaw('fname like ? or lname like ? or role_name like ? ',
								array('%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%'))
						->orderBy('user_id', 'asc')
						->paginate($perPage);
		}
		else{
			$userlist = $this->getUsernhc($perPage);
		}		
						
		return $userlist;
	}

	public function getUserByAgencyId(array $agency_id)
	{
		$rs = DB::table('v_user_info')
				->whereIn('agency_id',$agency_id)
				->where('grp_id','!=',1)
				->get();
		return $rs;
	}
}	