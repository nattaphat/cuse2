<?php

class PurposePolicy extends Eloquent {
	protected $guarded = array();

	protected $table = 'purpose_policy';

	public static $rules = array();

	/**
	 * [getDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  purpose name information and count
	 */
	public function getDataById($id)
	{
		$purp = PurposePolicy::where('policy_id','=',$id)->get(array('purp_id'));
		$purp_id = array_fetch($purp->toArray(), 'purp_id');
		$rs = DB::table('purpose')->whereIn('id',$purp_id)->get(array('purp_name'));
		$datas['count'] = count($rs);
		$datas['data'] = $rs;
		$datas['id'] = $purp_id;
		return $datas;
	}

	/**
	 * [delDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  data id information and count
	 */
	public function delDataById($id)
	{		
		$data = PurposePolicy::where('policy_id','=',$id)->delete();
	}

}
