<?php

class ObligationPolicy extends Eloquent {
	protected $guarded = array();

	protected $table = 'obligation_policy';

	public static $rules = array();

	/**
	 * [getDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  obligation name information and count
	 */
	public function getDataById($id)
	{
		$obl = ObligationPolicy::where('policy_id','=',$id)->get(array('obl_id'));
		$obl_id = array_fetch($obl->toArray(), 'obl_id');
		$rs = DB::table('obligation')->whereIn('id',$obl_id)->get(array('obl_name'));
		$datas['count'] = count($rs);
		$datas['data'] = $rs;
		$datas['id'] = $obl_id;
		return $datas;
	}

	/**
	 * [delDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  data id information and count
	 */
	public function delDataById($id)
	{		
		$data = ObligationPolicy::where('policy_id','=',$id)->delete();
	}
}
