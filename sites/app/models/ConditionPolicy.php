<?php

class ConditionPolicy extends Eloquent {
	protected $guarded = array();

	protected $table = 'condition_policy';

	public static $rules = array();

	/**
	 * [getDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  condition name information and count
	 */
	public function getDataById($id)
	{
		$cond = ConditionPolicy::where('policy_id','=',$id)->get(array('cond_id'));
		$cond_id = array_fetch($cond->toArray(), 'cond_id');
		$rs = DB::table('condition')->whereIn('id',$cond_id)->get(array('cond_name'));
		$datas['count'] = count($rs);
		$datas['data'] = $rs;
		$datas['id'] = $cond_id;
		return $datas;
	}

	/**
	 * [delDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  data id information and count
	 */
	public function delDataById($id)
	{		
		$data = ConditionPolicy::where('policy_id','=',$id)->delete();
	}
}
