<?php

class PolicyDuty extends Eloquent {
	protected $guarded = array();

	protected $table = 'policy_duty';

	public static $rules = array();

	/**
	 * [getUserList description]
	 * @return [type] [description]
	 */
	public function getUserList($perPage)
	{	

		$duty_list = PolicyDuty::whereNotNull('id')
						->orderBy('id','DESC')
						->paginate($perPage);
		return $duty_list;
	}

	/**
	 * [getDutyUser description]
	 * @return [type] [description]
	 */
	public function getDutyUser()
	{
		$duty_list = PolicyDuty::where('status','!=',false)
						->orderBy('id','DESC')
						->get();
		return $duty_list;
	}

	/**
	 * [getDutyUserById description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public static function getDutyUserById($id)
	{
		return PolicyDuty::find($id);
	}

	/**
	 * [policyDutySearch description]
	 * @param  [type] $keyword [description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function policyDutySearch($keyword,$perPage)
	{
		$duty_list = PolicyDuty::where('fname','LIKE','%'.$keyword.'%')
						->orWhere('lastname','LIKE','%'.$keyword.'%')
						->orWhere('position','LIKE','%'.$keyword.'%')
						->orWhere('email','LIKE','%'.$keyword.'%')
						->orderBy('id','DESC')
						->paginate($perPage);

		//var_dump($duty_list);
		return $duty_list;
	}

}
