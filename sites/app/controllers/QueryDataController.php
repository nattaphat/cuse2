<?php

class QueryDataController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public $user_id;
	public $role_id;
	public $policy_id;

	public function __construct()
	{
    	$this->user_id =  Auth::getUser()->id;
		$role_obj = new RoleUser();
		$this->role_id = $role_obj->getRoleById($this->user_id);

		$role_policy_ojb = new RolePolicy();
		$this->policy_id = $role_policy_ojb->getPolicyByRoleId($this->role_id->role_id);   
   	}

	/**
	 * [queryFrmAction show form query data by use ajax]
	 * @return [type] [description]
	 */
	public function queryFrmAction()
	{
		//$rs_data = QueryData::getDataType();//Get datatype only its exist in raw data
		
		// $user_id =  Auth::getUser()->id;
		// $role_obj = new RoleUser();
		// $role_id = $role_obj->getRoleById($user_id);

		// $role_policy_ojb = new RolePolicy();
		// $policy_id = $role_policy_ojb->getPolicyByRoleId($role_id->role_id);
		// var_dump($this->policy_id);exit;
		$data_privacy_obj =  new DataPrivacy();
		$rs_data_privacy = $data_privacy_obj->getDataByPolicyId($this->policy_id);

		// var_dump($role_id->role_id);
		// var_dump($policy_id);
		// var_dump($rs_data_privacy);
		//exit;
		
		// $arr_dataid = DataPrivacy::getData();// Get datatype all privacy data is on and relate with policy assigned
		// $rs_data = Data::getDataInfo($arr_dataid);

		$all_agency = Agency::all();
		$relate_policy = Policy::getPolicyByUserId();
		//$relate_condition = QueryData::getCondtionType();
		$query_obj = new QueryData();
		$relate_condition = $query_obj->getCondtionTypeV2($this->policy_id);
		// var_dump($relate_condition);exit;
		return View::make('querydata.data')
					->with('all_data',$rs_data_privacy)
					->with('all_agency',$all_agency)
					->with('relate_policy',$relate_policy)
					->with('relate_condition',$relate_condition)
					;
	}

	/**
	 * [queryDataAction query data by use ajax get data follow flag]
	 * @param  [integer] $dataid [data id]
	 * @param  [integer] $cond_id [condtion id]
	 * @param  [string] $flag   [to specific data is own agency or all agency]
	 * @param  [integer] $agencyid [agenc id]
	 * @return [array]         [collection of data]
	 */
	public function queryDataAction($dataid,$cond_id,$flag,$agencyid="")
	{
		$data_name = Data::find($dataid)->data_name;		
		$qData = new QueryData;
		$rsData = $qData->queryDataNHC($this->policy_id,$dataid,$cond_id,$flag,$agencyid);

		
		if($rsData)
		{
			if($dataid == 11){
				list($tb_name,$field,$datefield,$tele_id) = explode("-",$rsData['info_querydata']->table_name);
			}else{
				list($tb_name,$field,$datefield) = explode("-",$rsData['info_querydata']->table_name);
			}

			if($dataid == 6){
				$teleid = 'dam_id';
			}else{
				$teleid = 'tele_station_id';
			}
		}else
		{
			$rsData['data'] = null;
			$data_name = null;
			$datefield = null;
			$field = null;
			$teleid = null;
		}
		
		// var_dump($rsData);exit;
		// return View::make('querydata.ajax_test')
		// 			->with('paginator',$rsData['data']);
		return View::make('querydata.ajax_data')
						->with('paginator',$rsData['data'])
						->with('data_name',$data_name)
						->with('field_date',$datefield)
						->with('field_value',$field)
						->with('teleid',$teleid);
	}

	/**
	 * [userPeerPrivacy show informatioin of user by user's privacy in modal]
	 * @param  [integer] $id [user id]
	 * @return [type]     [description]
	 */
	public function userPeerPrivacy($id)
	{
		$user_info = new Usernhc;
		$rs_userinfo = $user_info->getUsernhcById($id);
		//var_dump($rs_userinfo);
		$privacy = new Privacy;
		$user_privacy = $privacy->getUserPrivacy($id);

		return View::make('peer.ajax_userprivacy')
					->with('user_info',$rs_userinfo[0])
					->with('user_privacy',$user_privacy[0]);
	}

	/**
	 * [peerDataFrm show form peer's data use ajax]
	 * @return [type] [description]
	 */
	public function peerDataFrm()
	{
		return View::make('peer.datalist')->with('all_data',Data::all());
	}

	/**
	 * [peerDataList return list of agency by data]
	 * @param  [type] $type [rainfall ,waterlevel,dam,temp etc.]
	 * @return [type]         [description]
	 */
	public function peerDataList($type)
	{
		$agency_id = Data::getAgencyByDataType($type);
		$rs = Agency::getAgency($agency_id);
		//var_dump($rs);exit;
		return View::make('peer.ajax_datalist')->with('result',$rs);
	}

	/**
	 * [dataPeerPrivacy return information of agency's privacy]
	 * @param  [integer] $agency_id [agency id]
	 * @return [type]            [description]
	 */
	public function dataPeerPrivacy($agency_id)
	{
		$dataprivacy = new DataPrivacy();

		//$rs index is agency_id
		$rs = $dataprivacy->getDataPrivacy($agency_id);
		
		// var_dump(Data::all()->toArray());
		// var_dump($rs);exit;
		return View::make('peer.ajax_dataprivacy')
					->with('agency_dataprivacy',$rs)
					->with('data_info',Data::all()->toArray());
	}
	
}