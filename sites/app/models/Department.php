<?php
class Department extends Eloquent
{
	public $timestamps = true; //for disable create_at and update_at 
	protected $guarded = array();

	protected $table = 'department';

	public static $rules = array();

	public function getDeaprtmentByMinistryId($ministry_id)
	{
		$rs = Department::where('ministry_id','=',$ministry_id)->get();
		return $rs;
	}

	public function getDeparmentInfoById($depid)
	{
		return Department::where('department_id','=',$depid)->get();
	}

	public function getDepartmentCodeById($depid)
	{
		$rs = Department::where('department_id','=',$depid)->get()->toArray();	
		$code = $rs[0]['department_code'];
		return $code;
	}
}