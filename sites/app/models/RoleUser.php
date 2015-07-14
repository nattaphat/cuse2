<?php

class RoleUser extends Eloquent {
	protected $guarded = array();

	public $timestamps = false; //disable timesamps option

	protected $table = 'role_user';

	public static $rules = array();

	public function getRoleById($id)
	{	
		$role = RoleUser::where('user_id','=',$id)->first();
		
		return $role;
	}

}
