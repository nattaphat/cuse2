<?php

class PeerController extends BaseController {

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

	/**
	 * [peerRoleFrm show form peer's role use ajax]
	 * @return [type] [description]
	 */
	public function peerRoleFrm()
	{
		return View::make('peer.rolelist')->with('all_role',Roles::all());
	}

	/**
	 * [peerRoleList return list of user by role]
	 * @param  [type] $roleid [description]
	 * @return [type]         [description]
	 */
	public function peerRoleList($roleid)
	{
		$rolelist = Usernhc::getRoleById($roleid);
		return View::make('peer.ajax_rolelist')
					->with('paginator',$rolelist);
	}

	/**
	 * [userPeerPrivacy show informatioin of user by user's privacy in modal]
	 * @param  [integer] $id [user id]
	 * @return [type]     [description]
	 */
	public function userPeerPrivacy($id)
	{
		$user_info = new Usernhc;
		$rs_userinfo = $user_info->getUsernhcPrivacyById($id);
		$arr_userinfo = json_decode(json_encode($rs_userinfo), true); 
		// var_dump($arr_userinfo);
		//
		// $privacy = new Privacy;
		// $user_privacy = $privacy->getUserPrivacy($id);

		$privacyInit = PrivacyInit::orderBy('id','asc')->get();
		// var_dump($privacyInit);

		return View::make('peer.ajax_userprivacy')
					->with('user_info',$arr_userinfo[0])
					->with('user_privacy',$privacyInit);
	}
	
	/**
	 * [peerAgencyFrm description]
	 * @return [type] [description]
	 */
	public function peerAgencyFrm()
	{
		$agency = Agency::all();
		return View::make('peer.agencylist')->with('all_agency',$agency);
	}

	/**
	 * [peerDataFrm show form peer's data use ajax]
	 * @return [type] [description]
	 */
	public function peerDataFrm()
	{
		return View::make('peer.datalist')
			->with('all_data',Data::all());
	}

	/**
	 * [peerDataList return list of agency by data]
	 * @param  [type] $data_id [rainfall ,waterlevel,dam,temp etc.]
	 * @return [type]         [description]
	 */
	public function peerDataList($data_id)
	{
		//var_dump($type);exit;
		// list ($table,$data_field,$date_field) = explode("-", $type);
		// $agency_id = Data::getAgencyByDataType($table);
		//print_r($agency_id);exit;
		
		//$rs = Agency::getAgency($agency_id);
		$agency_data = new AgencyData;
		$rs = $agency_data->getAgenyByDataId($data_id);
		//var_dump($rs);exit;
		return View::make('peer.ajax_datalist')->with('result',$rs);
	}


	public function peerAgencyList($agency_id)
	{
		// $data = new Data();
		// $rs = $data->getDataByAgency($agency_id);
		$dataprivacy = new DataPrivacy();
		$rs = $dataprivacy->getDataPrivacyByAgencyId($agency_id);
		return View::make('peer.ajax_agencylist')->with('agency_dataprivacy',$rs);	
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
		$rs = $dataprivacy->getDataPrivacyByAgencyId($agency_id);
		// $rs_alldata = Data::all()->toArray();
		// // var_dump(Data::all()->toArray());
		// var_dump($rs_alldata);
		// var_dump($rs);
		// exit;
		return View::make('peer.ajax_agencylist')
					->with('agency_dataprivacy',$rs);
	}
	
}