<?php

class DataPrivacy extends Eloquent {
	protected $guarded = array();

	public $timestamps = false;

	protected $table = 'data_privacy';

	public static $rules = array();

	/**
	 * [getDataPrivacy description]
	 * @param  [type] $agency_id [agency id]
	 * @return [type]            [description]
	 */
	public function getDataPrivacy($agency_id)
	{	
		//$d_privacy = DataPrivacy::where('agency_id','=',$agency_id)->get(array('status','agency_id','data_id'));
		$d_privacy = DB::select(DB::raw(
					"select *
					from data_privacy 
					where agency_id = :agency_id
					order by data_id"
				),array('agency_id'=>$agency_id)
			);

		if(isset($d_privacy)){
			foreach($d_privacy as $key => $value){
				$rs[$value->data_id] = $value;
			}
			//return $d_privacy->toArray();	
			//var_dump($rs);exit;	
			if(isset($rs))	return $rs;
		}else{
			return null;
		}
		
	}

	/**
	 * [getData get data at the status data is ture]
	 * @return [array] [return set of data status is true]
	 */
	public static function getData(){
		$user_role = new Usernhc();
		$role_id = $user_role->getRoleName()->role_id; //Get role id
		$rs_policy = RolePolicy::where('role_id','=',$role_id)->select('policy_id')->get()->toArray();//Get relate policy
		$policy_id = $rs_policy[0]['policy_id'];//Policy id
		$data_id = DataPolicy::where('policy_id','=',$policy_id)->select('data_id')->get()->toArray();
		$data_id = array_flatten($data_id);// Data id that relate with policy


		$rs_dataid =  DataPrivacy::where('status','=',true)
								->whereIn('data_id',$data_id)
								->distinct()
								->get(array('data_id'));
		
		foreach ($rs_dataid->toArray() as $key => $value) {
			$id[] = $value['data_id'];
		}
		//$dataid_set = implode("','", $id); //Displays 'A', 'B', 'C'
		return $id;
	}

	/**
	 * [getDataByPolicyId description]
	 * @param  array  $policy_id [description]
	 * @return [type]            [description]
	 */
	public function getDataByPolicyId(array $policy_id)
	{
		$rs = DB::table('v_data_privacy')
				->whereIn('policy_id',$policy_id)
				->where('privacy','=',true)
				->where('policy_status','=',true)
				->select('data_id','data_name')
				->distinct()
				->get();
		return $rs;
	}
	
	public function getDataByAgencyId($agency_id)
	{
		$rs = DB::table('v_data_privacy')
				->where('agency_id',$agency_id)
				->where('privacy','=',true)
				->select('data_id','data_name')
				->distinct()
				->get();
		return $rs;
	}

	public function getDataPrivacyByAgencyId($agency_id)
	{
		$rs = DB::table('v_data_privacy')
				->where('agency_id',$agency_id)
				->select('data_name','period','privacy')
				->distinct()
				->get();
		return $rs;
	}

}
