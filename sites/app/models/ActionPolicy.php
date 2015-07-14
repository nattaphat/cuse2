<?php

class ActionPolicy extends Eloquent {
	protected $guarded = array();

	protected $table = 'action_policy';

	public static $rules = array();

	/**
	 * [getDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  action name information and count
	 */
	public function getDataById($id)
	{
		$action = ActionPolicy::where('policy_id','=',$id)->get(array('action_id'));
		$action_id = array_fetch($action->toArray(), 'action_id');
		$rs = DB::table('action')->whereIn('id',$action_id)->get(array('action_name'));
		$datas['count'] = count($rs);
		$datas['data'] = $rs;
		$datas['id'] = $action_id;
		return $datas;
	}

	/**
	 * [delDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  data id information and count
	 */
	public function delDataById($id)
	{		
		$data = ActionPolicy::where('policy_id','=',$id)->delete();
	}
}