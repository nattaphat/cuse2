<?php

class Roles extends Eloquent {
	protected $guarded = array();

	protected $table = 'roles';

	public static $rules = array();

	public function getAllRole($perPage=null)
	{	
		$role = Roles::where('role_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		return $role;
	}

	/**
	 * [getRoleName role name]
	 * @param  [type] $id [user id]
	 * @return [array]     [description]
	 */
	public function getRoleName($id)
	{	
		$role_name = Roles::where('id','=',$id)->first();
		return $role_name;
	}

	/**
	 * [checkRole description]
	 * @param  [type] $role [description]
	 * @return [type]       [description]
	 */
	public function checkRole($role)
	{
		$rs = Roles::where('role_name','=',$role)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}

	/**
	 * [getRoleByKeywork search role]
	 * @param  [type] $keywork [description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getRoleByKeywork($keywork,$perPage)
	{
		if($keywork != 'all'){
			$role = Roles::whereRaw('role_name like ?',array('%'.$keywork.'%'))
						->orderBy('id', 'asc')
						->paginate($perPage);
		}
		else{
			$role = Roles::where('role_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		}		
						
		return $role;
	}

}
