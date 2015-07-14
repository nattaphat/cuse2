<?php

class Usergroup extends Eloquent {
	protected $guarded = array();

	protected $table = 'usergroup';

	public static $rules = array();

	/**
	 * [getGrpName group name]
	 * @param  [type] $id [user id]
	 * @return [array]     [description]
	 */
	public function getGrpName($id)
	{	
		$grp = Usergroup::where('id','=',$id)->first();
		return $grp;
	}

}
