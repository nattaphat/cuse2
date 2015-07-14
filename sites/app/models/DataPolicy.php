<?php

class DataPolicy extends Eloquent {
	protected $guarded = array();

	protected $table = 'data_policy';

	public static $rules = array();

	/**
	 * [getDataById retrive by policy id]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  data name information and count
	 */
	public function getDataById($id)
	{		
		$data = DataPolicy::where('policy_id','=',$id)->get(array('data_id'));
		$data_id = array_fetch($data->toArray(), 'data_id');
		$rs['name'] = DB::table('data')->whereIn('id',$data_id)->get(array('data_name'));
		$datas['count'] = count($rs); // count of data name
		$datas['data'] = $rs['name'];// array of data name
		$datas['id'] = $data_id;//array of data id
		return $datas;
	}

	/**
	 * [delDataById description]
	 * @param  integer 	$id 	policy id
	 * @return array 	$datas  data id information and count
	 */
	public function delDataById($id)
	{		
		$data = DataPolicy::where('policy_id','=',$id)->delete();
	}
}
