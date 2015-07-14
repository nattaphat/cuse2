<?php

class RolePolicy extends Eloquent {
	protected $guarded = array();
	public $timestamps = false;

	protected $table = 'role_policy';

	public static $rules = array();

	/**
	 * [getDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  role name information and count
	 */
	public function getDataById($id)
	{
		$role = RolePolicy::where('policy_id','=',$id)->get(array('role_id'));
		$role_id = array_fetch($role->toArray(), 'role_id');
		$rs = DB::table('roles')->whereIn('id',$role_id)->get(array('role_name'));
		$datas['count'] = count($rs);
		$datas['data'] = $rs;
		$datas['id'] = $role_id;

		return $datas;
	}

	/**
	 * [delDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  data id information and count
	 */
	public function delDataById($id)
	{		
		$data = RolePolicy::where('policy_id','=',$id)->delete();
	}

	/**
	 * [getPolicyByRoleId description]
	 * @param  [type] $role_id [description]
	 * @return [type]          [description]
	 */
	public function getPolicyByRoleId($role_id)
	{	
		$rs = RolePolicy::where('role_id','=',$role_id)
					->get();
		foreach ($rs as $key => $value)
		{
			$arr[] = $value->policy_id;
		}
		// var_dump($arr);
		return $arr;
	}
}
