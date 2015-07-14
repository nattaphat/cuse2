<?php

class RequestData extends Eloquent {
	protected $guarded = array();

	protected $table = 'request_data';

	public static $rules = array();

	/**
	 * [getRequestInfo return infomation of request data ] for notification
	 * @param  [type] $userid [user id]
	 * @return [array]     [description]
	 */
	public function getReqDataApproveNum($userid)
	{	
		$req_approve = RequestData::where('send_userid','=',$userid)
							->where('downloaded','=',false) //No action download
							->where('req_status','=',true) // Agency's data approved
							->join('agency','agency.code','=','request_data.agency_code')
							->join('data','data.id','=','request_data.data_id')
							->join('condition','condition.id','=','request_data.cond_id')
							->join('usernhc','usernhc.id','=','request_data.send_userid')
							->select(
								'agency.tname as agency_name',
								'data.data_name',
								'condition.cond_name',
								'request_data.req_status',
								'usernhc.fname',
								'usernhc.lname',
								'request_data.send_agencyid',
								'request_data.created_at'
							)
							->get();
		$rs['count'] = count($req_approve);
		$rs['approve_data'] = $req_approve;
		return $rs;
	}

	/**
	 * [getRequestInfo return infomation of request data ]
	 * @param  [type] $userid [user id]
	 * @return [array]     [description]
	 */
	public function getReqDataApprove($userid)
	{	
		$req_approve = RequestData::where('send_userid','=',$userid)
							->where('req_status','=',true) // Agency's data approved
							->join('agency','agency.code','=','request_data.agency_code')
							->join('data','data.id','=','request_data.data_id')
							->join('condition','condition.id','=','request_data.cond_id')
							->join('usernhc','usernhc.id','=','request_data.send_userid')
							->join('v_user_info','v_user_info.user_id','=','usernhc.id')
							->select(
								'agency.tname as agency_name',
								'data.data_name',
								'condition.cond_name',
								'request_data.req_status',
								'usernhc.fname',
								'usernhc.lname',
								'v_user_info.role_name',
								'request_data.send_agencyid',
								'request_data.updated_at',
								'request_data.created_at',
								'request_data.id',
								'request_data.comment',
								'request_data.downloaded',
								'request_data.app_userid',
								'request_data.agency_code',
								'request_data.req_type'
							)
							->get();
		$rs['count'] = count($req_approve);
		$rs['approve_data'] = $req_approve;
		return $rs;
	}

	/**
	 * [getReqData fetch request data]
	 * @param  [type] $agency_code [description]
	 * @return [type]              [description]
	 */
	public function getReqData($agency_code)
	{	
		$req_data = RequestData::where('agency_code','=',$agency_code)
							//->where('req_status','=',false) // Agency's data approved
							->join('agency','agency.code','=','request_data.agency_code')
							->join('data','data.id','=','request_data.data_id')
							->join('condition','condition.id','=','request_data.cond_id')
							->join('usernhc','usernhc.id','=','request_data.send_userid')
							->join('v_user_info','v_user_info.user_id','=','usernhc.id')
							->select(
								'agency.tname as agency_name',
								'data.data_name',
								'condition.cond_name',
								'request_data.req_status',
								'usernhc.fname',
								'usernhc.lname',
								'v_user_info.role_name',
								'request_data.send_agencyid',
								'request_data.created_at',
								'request_data.id',
								'request_data.downloaded',
								'request_data.req_type'
							)
							->get();
		$rs['count'] = count($req_data);
		$rs['req_data'] = $req_data;
		return $rs;
	}

	/**
	 * [getReqData fetch request data] for notification on top menu
	 * @param  [type] $agency_code [description]
	 * @return [type]              [description]
	 */
	public function getReqDataNum($agency_code)
	{	
		$req_data = RequestData::where('agency_code','=',$agency_code)
							->where('req_status','=',false) // Agency's data approved
							->join('agency','agency.code','=','request_data.agency_code')
							->join('data','data.id','=','request_data.data_id')
							->join('condition','condition.id','=','request_data.cond_id')
							->join('usernhc','usernhc.id','=','request_data.send_userid')
							->join('v_user_info','v_user_info.user_id','=','usernhc.id')
							->select(
								'agency.tname as agency_name',
								'data.data_name',
								'condition.cond_name',
								'request_data.req_status',
								'usernhc.fname',
								'usernhc.lname',
								'v_user_info.role_name',
								'request_data.send_agencyid',
								'request_data.created_at',
								'request_data.id'
							)
							->get();
		$rs['count'] = count($req_data);
		$rs['req_data'] = $req_data;
		return $rs;
	}

	/**
	 * [getReqData fetch request data]
	 * @param  [type] $agency_code [description]
	 * @return [type]              [description]
	 */
	public function getReqDataById($id)
	{	
		$req_data = RequestData::where('request_data.id','=',$id)
							->join('agency','agency.code','=','request_data.agency_code')
							->join('data','data.id','=','request_data.data_id')
							->join('condition','condition.id','=','request_data.cond_id')
							->join('usernhc','usernhc.id','=','request_data.send_userid')
							->select(
								'agency.tname as agency_name',
								'data.data_name',
								'condition.cond_name',
								'request_data.req_status',
								'usernhc.fname',
								'usernhc.lname',
								'request_data.send_agencyid',
								'request_data.created_at',
								'request_data.id'
							)
							->get();
		$rs['count'] = count($req_data);
		$rs['req_data'] = $req_data;
		return $rs;
	}

	/**
	 * [numReqData description]
	 * @param  [type] $data_id     [description]
	 * @param  [type] $cond_id     [description]
	 * @param  [type] $agency_code [description]
	 * @param  [type] $req_type    [description]
	 * @return [type]              [description]
	 */
	public function numReqData($data_id,$cond_id,$agency_code,$req_type)
	{
		$rs = RequestData::where('data_id','=',$data_id)
						->where('cond_id','=',$cond_id)
						->where('agency_code','=',$agency_code)
						->where('req_type','=',$req_type)
						->where('downloaded','=',FALSE)
						//->toSql();exit;
						->count();
		return $rs;
	}
	/**
	 * [getReqAndAppDataInfoNum description] for notification
	 * @return [type] [description]
	 */
	public function getReqAndAppDataInfoNum()
	{
		$userid = Auth::getUser()->id;
		$ageycy_id = Auth::getUser()->agency_id;
		$agency_code = Agency::find($ageycy_id);

		$reqdata = new RequestData();
		$rs_approve = $reqdata->getReqDataApproveNum($userid);
		$rs_req = $reqdata->getReqDataNum($agency_code->code);

		$rs['req'] = $rs_req;
		$rs['approve'] = $rs_approve;

		return $rs;
	}

	/**
	 * [getReqAndAppDataInfo description]
	 * @return [type] [description]
	 */
	public function getReqAndAppDataInfo()
	{
		$userid = Auth::getUser()->id;
		$ageycy_id = Auth::getUser()->agency_id;
		$agency_code = Agency::find($ageycy_id);

		$reqdata = new RequestData();
		$rs_approve = $reqdata->getReqDataApprove($userid);
		$rs_req = $reqdata->getReqData($agency_code->code);

		// var_dump($rs_approve);
		$rs['req'] = $rs_req;
		$rs['approve'] = $rs_approve;

		return $rs;
	}

	/**
	 * [getReqDataByKeywork description]
	 * @param  [type] $keyword  [description]
	 * @param  [type] $req_type [description]
	 * @param  [type] $perPage  [description]
	 * @return [type]           [description]
	 */
	public function getReqDataByKeywork($keyword,$perPage)
	{
		if($keyword != 'all'){
			$reqdata = RequestData::whereRaw('data.data_name like ? or agency.tname like ? or usernhc.fname like ? or v_user_info.role_name like ?',array('%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%'))
						//->where('req_type','=',$req_type) // Agency's data approved
						->join('agency','agency.code','=','request_data.agency_code')
						->join('data','data.id','=','request_data.data_id')
						->join('condition','condition.id','=','request_data.cond_id')
						->join('usernhc','usernhc.id','=','request_data.send_userid')
						->join('v_user_info','v_user_info.user_id','=','usernhc.id')
						->select(
							'agency.tname as agency_name',
							'data.data_name',
							'condition.cond_name',
							'request_data.req_status',
							'usernhc.fname',
							'usernhc.lname',
							'v_user_info.role_name',
							'request_data.send_agencyid',
							'request_data.created_at',
							'request_data.id',
							'request_data.downloaded',
							'request_data.req_type'
						)
						->orderBy('request_data.downloaded','asc')
						->paginate($perPage);
		}
		else{
			$reqdata = RequestData::join('agency','agency.code','=','request_data.agency_code')
						->join('data','data.id','=','request_data.data_id')
						->join('condition','condition.id','=','request_data.cond_id')
						->join('usernhc','usernhc.id','=','request_data.send_userid')
						->join('v_user_info','v_user_info.user_id','=','usernhc.id')
						->select(
							'agency.tname as agency_name',
							'data.data_name',
							'condition.cond_name',
							'request_data.req_status',
							'usernhc.fname',
							'usernhc.lname',
							'v_user_info.role_name',
							'request_data.send_agencyid',
							'request_data.created_at',
							'request_data.id',
							'request_data.downloaded',
							'request_data.req_type'
						)
						->orderBy('request_data.downloaded','asc')
						->paginate($perPage);
		}		
						
		return $reqdata;
	}

	public function getResultByKeywork($keyword,$perPage)
	{
		$userid = Auth::getUser()->id;
		if($keyword != 'all')
		{
			$rs = RequestData::where('send_userid','=',$userid)
						->whereRaw(
							'data.data_name like ? '.
							'or request_type_data.type_name like ? '.
							'or v_user_info.fname like ? '.
							'or v_user_info.lname like ? '.
							'or v_user_info.role_name like ? '.
							'or v_user_info.agency_name like ? ',
							array(
									'%'.$keyword.'%',
									'%'.$keyword.'%',
									'%'.$keyword.'%',
									'%'.$keyword.'%',
									'%'.$keyword.'%',
									'%'.$keyword.'%')
							)
						->where('downloaded','=',false) //No action download
						->where('req_status','=',true) // Agency's data approved
						->join('v_user_info','v_user_info.user_id','=','request_data.send_userid')
						->join('condition','condition.id','=','request_data.cond_id')
						->join('data','data.id','=','request_data.data_id')
						->join('request_type_data','request_type_data.id','=','request_data.req_type')
						->select(
							'v_user_info.agency_name',
							'v_user_info.code',
							'data.data_name',
							'condition.cond_name',
							'request_data.req_status',
							'request_data.req_type',
							'request_type_data.type_name',
							'v_user_info.user_id',
							'v_user_info.fname',
							'v_user_info.lname',
							'v_user_info.role_name',
							'request_data.send_agencyid',
							'request_data.created_at',
							'request_data.updated_at',
							'request_data.app_userid',
							'request_data.downloaded'
						)
						->paginate($perPage);
		}else
		{
			// $rs = RequestData::where('send_userid','=',$userid)
			// 			->where('req_status','=',true) // Agency's data approved
			// 			->where('downloaded','=',false) //No action download
			// 			->join('agency','agency.code','=','request_data.agency_code')
			// 			->join('data','data.id','=','request_data.data_id')
			// 			->join('condition','condition.id','=','request_data.cond_id')
			// 			->join('usernhc','usernhc.id','=','request_data.send_userid')
			// 			->join('v_user_info','v_user_info.user_id','=','usernhc.id')
			// 			->select(
			// 				'agency.tname as agency_name',
			// 				'agency.code',
			// 				'data.data_name',
			// 				'condition.cond_name',
			// 				'request_data.req_status',
			// 				'request_data.req_type',
			// 				'usernhc.id',
			// 				'usernhc.fname',
			// 				'usernhc.lname',
			// 				'v_user_info.role_name',
			// 				'request_data.send_agencyid',
			// 				'request_data.created_at',
			// 				'request_data.updated_at',
			// 				'request_data.app_userid',
			// 				'request_data.downloaded'
			// 			)
			// 			->paginate($perPage);
			
			$rs = RequestData::where('send_userid','=',$userid)
						->where('req_status','=',true) // Agency's data approved
						->join('v_user_info','v_user_info.user_id','=','request_data.send_userid')
						->join('condition','condition.id','=','request_data.cond_id')
						->join('data','data.id','=','request_data.data_id')
						->join('request_type_data','request_type_data.id','=','request_data.req_type')
						->select(
							'v_user_info.agency_name',
							'v_user_info.code',
							'data.data_name',
							'condition.cond_name',
							'request_data.req_status',
							'request_data.req_type',
							'request_type_data.type_name',
							'v_user_info.user_id',
							'v_user_info.fname',
							'v_user_info.lname',
							'v_user_info.role_name',
							'request_data.send_agencyid',
							'request_data.created_at',
							'request_data.updated_at',
							'request_data.app_userid',
							'request_data.downloaded'
						)
						->orderBy('request_data.downloaded','asc')
						->paginate($perPage);
		}
		//echo $rs;exit;
		//var_dump($rs);exit;
		return $rs;
	}
}
