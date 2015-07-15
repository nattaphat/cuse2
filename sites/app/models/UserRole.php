<?php

/**
 * Created by IntelliJ IDEA.
 * User: yotzapon
 * Date: 7/15/15
 * Time: 1:59 PM
 */


class UserRole extends Eloquent {
	protected $guarded = array();
	public $timestamps = false;
	protected $table = 'v_roles_known';
    protected $primaryKey = 'role_id';
	public static $rules = array();

    public function getRoleInfo($role_id)
    {
        $rs = UserRole::where('role_id','=',$role_id)->get();
        return $rs;
    }
}