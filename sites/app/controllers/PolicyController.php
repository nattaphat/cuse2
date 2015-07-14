<?php

class PolicyController extends BaseController {

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

	public $type_duty;

	public function __construct()
	{
		$this->type_duty = array('1'=>'รับผิดชอบด้านนโยบาย','2'=>'รับผิดชอบด้านไพรเวซีในองค์กร','3'=>'รับผิดชอบด้านความมั่นคงในองค์กร');
	}

	/**
	 * [policyAction for show policy content]
	 * @return [none] [redirect to policy page]
	 */
	public function policyAction()
	{
		$policy = new Policy();
		$per_page = Config::get('nhc/site.policy_perpage') ;
		$policies = $policy->getAllPolicy($per_page);
        //$policies = $policy->getAllPolicyVersion2();
        return View::make('policy.policy')->with('paginator',$policies);
	}

	/**
	 * [policyAddAction for show form adding policy]
	 * @return [none] [redirect to adding policy page]
	 */
	public function policyAddAction(){
		$policyduty_obj = new PolicyDuty();
		$rs = $policyduty_obj->getDutyUser();
		return View::make('policy.addpolicy')->with('policy_duty',$rs);
	}

	/**
	 * [policyShowAction for show policy content by policy id]
	 * @param  [integer] $id [policy id]
	 * @return [none]     [redirect to edit policy policy by id]
	 */
	public function policyShowAction($id){
		$policy = new Policy();
		$result = $policy->getPolicyById($id);

		$policyduty_obj = new PolicyDuty();
		$rs_policyduty = $policyduty_obj->getDutyUser();

		return View::make('policy.editpolicy')
							->with('policy_result',$result)
							->with('policy_duty',$rs_policyduty);
	}

	/**
	 * [policySaveAction for save policy]
	 * @return [none] [redirect to policy page]
	 */
	public function policySaveAction(){
		Input::flash();
		$data = Input::all();
		if(!isset($data['policy-status']))
			$data['policy-status'] ='off';
		// var_dump($data);exit;
		$rules = array(
			//'username'=> 'awesome',
			'policy-text' => array('min:30','required'), 
			'policy-author' => array('required'),
			'policy-status' => array('required')
		);

		// Build the custom messages array.
		$messages = array(
			'policy-text.min' => 'กรุณาระบุเนื้อหานโยบายอย่างน้อย :min ตัวอักษร.',
			'policy-text.required' => 'กรุณาระบุเนื้อหานโยบายคลังฯ',
			'policy-author.required' => 'กรุณาระบุชื่อผู้สร้างนโยบาย'
		);

		$policy_text = trim($data['policy-text']);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			// Normally we would do something with the data.
			$policy = new Policy;

			$chk_pol = $policy->ckeckPolicyDuplicate(mb_strlen($policy_text));
			$policy->setTable('policy');
			if($chk_pol)
			{
				$policy->policy_content = $policy_text;
				$policy->author = $data['policy-author'] ;
				$policy->status = (($data['policy-status'] == 'on') ? True : False);
				$policy->policy_duty = $data['policy_duty'];
				$policy->save();
				return Redirect::to('policy-add')->with('success','บันทึกนโยบายคลังฯ สำเร็จ');
			}else
			{
				return Redirect::to('policy-add')
								->withErrors(array(
										'มีนโยบายคลังฯ นี้อยุ่ในระบบแล้ว')
								);
			}
			// if($chk_pol)
			// {
			// 	return Redirect::to('policy-content')->withErrors('message','Existing Policy.');
			// }else
			// {
			// 	$policy->policy_content = $policy_text;
			// 	$policy->author = $data['policy-author'] ;
			// 	$policy->status = (($data['policy-status'] == 1) ? True : False);
			// 	//$policy->save();
			// 	return Redirect::to('policy-content')->with('success','Policy Added.');
			// }
			
		}else{
			//$errors = $validator->messages();
			return Redirect::to('policy-add')->withErrors($validator);
		}
	}

	/**
	 * [policyEditAction for edit policy by send policy id]
	 * @param  [integer] $id [policy id for edit]
	 * @return [redirect]     [description]
	 */
	public function policyEditAction($id){

		$data = Input::all();
		if(!isset($data['policy-status']))
			$data['policy-status'] ='off';
		// var_dump($data); exit();
		$rules = array(
			//'username'=> 'awesome',
			'policy-text' => array('min:3','required'),
			'policy-author' => array('required'),

		);

		// Build the custom messages array.
		$messages = array(
			'policy-text.min' => 'กรุณาระบุเนื้อหานโยบายอย่างน้อย :min ตัวอักษร.',
			'policy-text.required' => 'กรุณาระบุเนื้อหานโยบายคลังฯ',
			'policy-author.required' => 'กรุณาระบุชื่อผู้สร้างนโยบาย'
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		$policy_text = $data['policy-text'];
		$policy_duty = $data['policy_duty'];
		$policy_athor = $data['policy-author'];
		if ($validator->passes()) {
			// Normally we would do something with the data.
			$policy = new Policy();
			//$chk_pol = $policy->ckeckPolicyDuplicate(mb_strlen($policy_text));

			// if($chk_pol)
			// {
				$policy = Policy::find($id);
				$policy->setTable('policy');
				$policy->policy_content = $policy_text;
				$policy->policy_duty = $policy_duty;
				$policy->author = $policy_athor;

				if( $data['policy-status'] =='on'){
					 $status = True ;	
				}else{
					$status = False;
				}
				$policy->status = $status;
				$policy->save();
				return Redirect::to('policy-content')->with('success','มีนโยบายคลังฯรหัส = '.$id.' แก้ไขสำเร็จ.');
			// }else
			// {
			// 	return Redirect::to('policy-show/'.$id)->with('warning','มีนโยบายคลังฯรหัส = '.$id.' ไม่มีการเปลี่ยนแปลงใดๆ');
			// }
			
		}else{
			//$errors = $validator->messages();
			return Redirect::to('policy-show/'.$id)->withErrors($validator);
		}
	}

	/**
	 * [policySearchAction for seach policy content]
	 * @param  [string] $keyword [keyword for search]
	 * @return [type]          [description]
	 */
	public function policySearchAction($keyword){
		$policy = new Policy();
		$per_page = Config::get('nhc/site.policy_perpage') ;
		$policies = $policy->getPolicyByKeywork($keyword,$per_page);
		if(Request::ajax())
        {

			//$html = View::make('blpolicyog.policy');
			$html = View::make('policy.searchpolicy')->with('paginator',$policies);
			return $html;
        }
	}

	 /**
	  * [policyRBACAction get all each rbac name for use in list box for assign to policy]
	  * @param  [integer] $id [policy id]
	  * @return [array]     [description]
	  */
	public function policyRBACAction($id){
		$data['policy'] = Policy::find($id);
		$data['role'] = Roles::all();
		$data['data'] = Data::all();
		$data['condition'] = Condition::all();
		$data['action'] = Action::all();
		$data['purpose'] = Purpose::all();
		$data['obligation'] = Obligation::all();
		$pol = self::policyRBACEditAction($id);
		
		return View::make('rbac.policytorbac')
					->with('results',$data)
					->with('rbac_data',$pol);
	}

	/**
	 * [policyDelAction for remove policy from database]
	 * @param  [integer] $id [policy id]
	 * @return [none]     [redirect to policy page]
	 */
	public function policyDelAction($id)
	{
		try {
			$policy = new Policy();
			$policy->setTable('policy');
			$policy->where('id','=',$id)->delete();
		    
		    //Policy::table('policy')->where('id','=',$id)->delete();
			RolePolicy::where('policy_id','=',$id)->delete();
			ActionPolicy::where('policy_id','=',$id)->delete();
			DataPolicy::where('policy_id','=',$id)->delete();
			ConditionPolicy::where('policy_id','=',$id)->delete();
			ObligationPolicy::where('policy_id','=',$id)->delete();
			PurposePolicy::where('policy_id','=',$id)->delete();
			
			return Redirect::to('policy-content')->with('success','มีนโยบายคลังฯรหัส = '.$id.' ลบทิ้งสำเร็จ');

		} catch (Exception $e) {
		    return Redirect::to('policy-content')
		    			->withErrors(
		    				array(
		    						'Caught exception: '.$e->getMessage()
		    					));
		}

	}

	/**
	 * [policyRBACSaveAction for save each policy and rbac option]
	 * @param  [integer] $id [policy id]
	 * @return [none]     [redirect to rbac-policy page]
	 */
	public function policyRBACSaveAction($id)
	{
		$data = Input::all();
		
		$rules = array(
			'rbac_role' => array('required'), 
			'rbac_data' => array('required'),
			'rbac_action' => array('required'),
			//'rbac_purpose' => array('required'),
			'rbac_condition' => array('required'),
			//'rbac_obligation' => array('required')
		);

		// Build the custom messages array.
		$messages = array(
			'rbac_role.required' => 'กรุณาระบุชื่อบทบาท',
			'rbac_data.required' => 'กรุณาระบุชื่อข้อมูล',
			'rbac_action.required' => 'กรุณาระบุชื่อการกระทำ',
			//'rbac_purpose.required' => 'กรุณาระบุชื่อวัตถุประสงค์',
			'rbac_condition.required' => 'กรุณาระบุชื่อเงื่อนไข',
			//'rbac_obligation.required' => 'กรุณาระบุชื่อข้อผูกพัน',
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if($validator->passes()){

			//For Role
			RolePolicy::where('policy_id','=',$id)->delete();
			foreach ($data['rbac_role'] as $key => $value) {
				$role_data['role_id'] = $value;
				$role_data['policy_id'] = $id;
				$datas_role[] = $role_data;
			}
			// var_dump($datas_role);exit;
			RolePolicy::insert($datas_role);

			//For Data
			DataPolicy::where('policy_id','=',$id)->delete();
			foreach ($data['rbac_data'] as $key => $value) {
				$_data['data_id'] = $value;
				$_data['policy_id'] = $id;
				$datas[] = $_data;
			}
			DataPolicy::insert($datas);

			//For Condition
			ConditionPolicy::where('policy_id','=',$id)->delete();
			foreach ($data['rbac_condition'] as $key => $value) {
				$cond_data['cond_id'] = $value;
				$cond_data['policy_id'] = $id;
				$datas_cond[] = $cond_data;
			}
			//var_dump($datas_cond);exit;
			ConditionPolicy::insert($datas_cond);

			//For Purpose
			PurposePolicy::where('policy_id','=',$id)->delete();
			if(isset($data['rbac_purpose']))
			{
				foreach ($data['rbac_purpose'] as $key => $value) {
					$purp_data['purp_id'] = $value;
					$purp_data['policy_id'] = $id;
					$datas_purp[] = $purp_data;
				}
				PurposePolicy::insert($datas_purp);
			}
			

			//For Obligation
			ObligationPolicy::where('policy_id','=',$id)->delete();
			if(isset($data['rbac_obligation']))
			{
				foreach ($data['rbac_obligation'] as $key => $value) {
					$obl_data['obl_id'] = $value;
					$obl_data['policy_id'] = $id;
					$datas_obl[] = $obl_data;
				}
				ObligationPolicy::insert($datas_obl);	
			}
			

			//For Action
			ActionPolicy::where('policy_id','=',$id)->delete();
			foreach ($data['rbac_action'] as $key => $value) {
				$action_data['action_id'] = $value;
				$action_data['policy_id'] = $id;
				$datas_action[] = $action_data;
			}
			ActionPolicy::insert($datas_action);

			return Redirect::to('/policy-rbac/'.$id)
							->with('success','อาร์บีเอซี:มีนโยบายคลังฯรหัส = '.$id.' บันทึกสำเร็จ')
							->with('rbac_data',self::policyRBACEditAction($id));	
		}else{
			return Redirect::to('/policy-rbac/'.$id)
							->withErrors($validator);
		}
	}

	/**
	 * [getRBACByPolicyId get all RBAC attribute by policy id]
	 * @param  [integer] $policy_id [policy id]
	 * @return [array]            [collection of rbac]
	 */
	public static function getRBACByPolicyId($policy_id)
	{
		$rbac_data = new DataPolicy;
		$rs_data = $rbac_data->getDataById($policy_id);
		$data['rbac_data'] = $rs_data;

		$rbac_action = new ActionPolicy;
		$rs_action = $rbac_action->getDataById($policy_id);
		$data['rbac_action'] = $rs_action;

		$rbac_cond = new ConditionPolicy;
		$rs_cond = $rbac_cond->getDataById($policy_id);
		$data['rbac_cond'] = $rs_cond;

		$rbac_obl = new ObligationPolicy;
		$rs_obl = $rbac_obl->getDataById($policy_id);
		$data['rbac_obl'] = $rs_obl;

		$rbac_purp = new PurposePolicy;
		$rs_purp = $rbac_purp->getDataById($policy_id);
		$data['rbac_purp'] = $rs_purp;

		$rbac_role = new RolePolicy;
		$rs_role = $rbac_role->getDataById($policy_id);
		$data['rbac_role'] = $rs_role;

		if(isset($data))
		{
			foreach ($data as $key => $value) {
				$temp[] = $value['count'];
			}
			$data['total'] = max($temp);
			// print '<pre>';
			// print_r($data['rbac_role']['data'][0]->role_name);
			// print_r($data);
			// exit();
			return $data;			
		}
	}
	/**
	 * [policyRBACEditAction collection of each rbac by policy id]
	 * @param  [integer] $id [id of policy]
	 * @return [array]   $datas  [data of rbac]
	 */
	public function policyRBACEditAction($id)
	{
		$data_validation = array('policy_id'=>$id);
		

		//For Data 
		$rules = array(
			'policy_id' => 'unique:data_policy,policy_id', 
		);
		// Create a new validator instance.
		$validator = Validator::make($data_validation, $rules);
		if (!$validator->passes()) {//Mean has policy in this table
			$rbac_data = new DataPolicy;
			$rs_data = $rbac_data->getDataById($id);
			$data['rbac_data'] = $rs_data;
		}

		
		//For Action
		$rules = array(
			'policy_id' => 'unique:action_policy,policy_id', 
		);
		// Create a new validator instance.
		$validator = Validator::make($data_validation, $rules);
		if (!$validator->passes()) {//Mean has policy in this table
			$rbac_action = new ActionPolicy;
			$rs_action = $rbac_action->getDataById($id);
			$data['rbac_action'] = $rs_action;
		}

		//For Conditoin
		$rules = array(
			'policy_id' => 'unique:condition_policy,policy_id', 
		);
		// Create a new validator instance.
		$validator = Validator::make($data_validation, $rules);
		if (!$validator->passes()) {//Mean has policy in this table
			$rbac_cond = new ConditionPolicy;
			$rs_cond = $rbac_cond->getDataById($id);
			$data['rbac_cond'] = $rs_cond;
		}

		//For Obligation
		$rules = array(
			'policy_id' => 'unique:obligation_policy,policy_id', 
		);
		// Create a new validator instance.
		$validator = Validator::make($data_validation, $rules);
		if (!$validator->passes()) {//Mean has policy in this table
			$rbac_obl = new ObligationPolicy;
			$rs_obl = $rbac_obl->getDataById($id);
			//if(isset($rs_obl))
			$data['rbac_obl'] = $rs_obl;
		}

		//For Purpose
		$rules = array(
			'policy_id' => 'unique:purpose_policy,policy_id', 
		);
		// Create a new validator instance.
		$validator = Validator::make($data_validation, $rules);
		if (!$validator->passes()) {//Mean has policy in this table
			$rbac_purp = new PurposePolicy;
			$rs_purp = $rbac_purp->getDataById($id);
			$data['rbac_purp'] = $rs_purp;
		}		

		//For Role
		$rules = array(
			'policy_id' => 'unique:purpose_policy,policy_id', 
		);
		// Create a new validator instance.
		
		$validator = Validator::make($data_validation, $rules);
		if (!$validator->passes()) {//Mean has policy in this table
			$rbac_role = new RolePolicy;
			$rs_role = $rbac_role->getDataById($id);
			$data['rbac_role'] = $rs_role;
		}	

		if(isset($data))
		{
			foreach ($data as $key => $value) {
				$temp[] = $value['count'];
			}
			$data['total'] = max($temp);
			// print '<pre>';
			// print_r($data['rbac_role']['data'][0]->role_name);
			// print_r($data);
			// exit();
			return $data;			
		}
		
	}

	/**
	 * [policyRBACEditFrmAction Show form for edit rbac-policy]
	 * @param  [integer] $id policy id
	 * @return [none] redirect to view
	 */
	public function policyRBACEditFrmAction($id)
	{
		$data['policy'] = Policy::find($id);
		$data['role'] = Roles::all();
		$data['data'] = Data::all();
		$data['condition'] = Condition::all();
		$data['action'] = Action::all();
		$data['purpose'] = Purpose::all();
		$data['obligation'] = Obligation::all();
		
		// print '<pre>';
		// print_r(self::policyRBACEditAction($id));
		// exit();
		return View::make('rbac.editrbac')
					->with('results',$data)
					->with('rbac_data',self::policyRBACEditAction($id));
	}

	/**
	 * [policyRBACEditedAction this action take after edit form will delete all of rabc relate with policy id
	 * and insert the new one]
	 * @param  [integer] $id [policy id]
	 * @return [array]     [description]
	 */
	public function policyRBACEditedAction($id)
	{
		$data = Input::all();
		//var_dump($data);exit();
		//Step 1. remove each rbac in table
		$role_obj = new RolePolicy;
		$role_obj->delDataById($id);
		$data_obj = new DataPolicy;
		$data_obj->delDataById($id);
		$cond_obj = new ConditionPolicy;
		$cond_obj->delDataById($id);
		$purp_obj = new PurposePolicy;
		$purp_obj->delDataById($id);
		$obl_obj = new ObligationPolicy;
		$obl_obj->delDataById($id);
		$action_obj = new ActionPolicy;
		$action_obj->delDataById($id);

		//Step 2. insert new rbac 
		//For Role
		foreach ($data['rbac_role'] as $key => $value) {
			$role_data['role_id'] = $value;
			$role_data['policy_id'] = $id;
			$datas_role[] = $role_data;
		}
		RolePolicy::insert($datas_role);

		//For Data
		foreach ($data['rbac_data'] as $key => $value) {
			$_data['data_id'] = $value;
			$_data['policy_id'] = $id;
			$datas[] = $_data;
		}
		DataPolicy::insert($datas);

		//For Condition
		foreach ($data['rbac_condition'] as $key => $value) {
			$cond_data['cond_id'] = $value;
			$cond_data['policy_id'] = $id;
			$datas_cond[] = $cond_data;
		}
		ConditionPolicy::insert($datas_cond);

		//For Purpose
		foreach ($data['rbac_purpose'] as $key => $value) {
			$purp_data['purp_id'] = $value;
			$purp_data['policy_id'] = $id;
			$datas_purp[] = $purp_data;
		}
		PurposePolicy::insert($datas_purp);

		//For Obligation
		foreach ($data['rbac_obligation'] as $key => $value) {
			$obl_data['obl_id'] = $value;
			$obl_data['policy_id'] = $id;
			$datas_obl[] = $obl_data;
		}
		ObligationPolicy::insert($datas_obl);

		//For Action
		foreach ($data['rbac_action'] as $key => $value) {
			$action_data['action_id'] = $value;
			$action_data['policy_id'] = $id;
			$datas_action[] = $action_data;
		}
		ActionPolicy::insert($datas_action);

		return Redirect::to('/policy-rbac/'.$id)
						->with('success','อาร์บีเอซี:มีนโยบายคลังฯรหัส = '.$id.' แก้ไขสำเร็จ.')
						->with('rbac_data',self::policyRBACEditAction($id));
	}

	/**
	 * [policyRBACDelAction remove each rbac relate with policy id]
	 * @param  [integer] $id [policy id]
	 * @return [type]     [description]
	 */
	public function policyRBACDelAction($id)
	{
		$role_obj = new RolePolicy;
		$role_obj->delDataById($id);
		$data_obj = new DataPolicy;
		$data_obj->delDataById($id);
		$cond_obj = new ConditionPolicy;
		$cond_obj->delDataById($id);
		$purp_obj = new PurposePolicy;
		$purp_obj->delDataById($id);
		$obl_obj = new ObligationPolicy;
		$obl_obj->delDataById($id);
		$action_obj = new ActionPolicy;
		$action_obj->delDataById($id);

		return Redirect::to('/policy-rbac/'.$id)
						->with('success','อาร์บีเอซี:มีนโยบายคลังฯรหัส = '.$id.' ลบทิ้งสำเร็จ');
	}

	/**
	 * [policyRBACUser list all attribute  of rbac fetch data by policy id]
	 * @param  [integer] $policy_id [policy id]
	 * @return [array]            [collection of policy info and rbac info]
	 */
	public function policyRBACUser($policy_id){
		$data = self::getRBACByPolicyId($policy_id);	
		$policy = new Policy();
		$result = $policy->getPolicyById($policy_id);
		// var_dump($data);
		// var_dump($result);exit;
		return View::make('policy.userpolicy')
					->with('results',$result)
					->with('rbac_data',$data);
	}

	/**
	 * [listRoleDataFrm show form role and select role run by ajax]
	 * @return [array] [collect of role]
	 */
	public function listRoleFrm()
	{
		return View::make('rbac.rolelist')
					->with('all_role',Role::all());
	}

	public function getListRole($roleid)
	{
		$rolelist = Usernhc::getRoleById($roleid);
		return View::make('rbac.ajax_rolelist')
					->with('paginator',$rolelist);
	}

	/**
	 * [listDataFrm show form data and select data run by ajax
	 * @return [array] [collect of data]
	 */
	public function listDataFrm()
	{
		return View::make('rbac.datalist')
					->with('all_data',Data::all());
	}

	/**
	 * [getDataList list of agency by each type of data]
	 * @param  [integer] $type [type id riainfall, water level ,dam ect.]
	 * @return [type]       [description]
	 */
	public function getDataList($type)
	{
		$agency_id = Data::getAgencyByDataType($type);
		$rs = Agency::getAgency($agency_id);
		return View::make('rbac.ajax_datalist')->with('result',$rs);
	}

	/**
	 * [policyDutyAdd description]
	 * @return [type] [description]
	 */
	public function policyDutyAdd()
	{
		
		return View::make('policyduty.add')
				->with('duty_type',$this->type_duty);
	}

	/**
	 * [policyDutyList description]
	 * @return [type] [description]
	 */
	public function policyDutyList()
	{	
		$per_page = Config::get('nhc/site.ole_perpage');
		$policyDuty = new PolicyDuty();
		$rs = $policyDuty->getUserList($per_page);

		return View::make('policyduty.list')->with('paginator',$rs);	
	}

	/**
	 * [policyDutySave description]
	 * @return [type] [description]
	 */
	public function policyDutySave()
	{
		Input::flash();
		$data = Input::all();

		$rules = array(
			'dutyname' => array('required'), 
			'dutylname' => array('required'), 
			'dutyrole' => array('required'), 
			'dutytelno' => array('required'), 
			'dutyemail' => array('required','email'), 
			'dutyemail' => array('unique:policy_duty,email'),
			'dutyname' => array('unique:policy_duty,fname')
		);


		// Build the custom messages array.
		$messages = array(
			'dutyname.required' => 'กรุณาระบุชื่อผู้รับผิดชอบ',
			'dutylname.required' => 'กรุณาระบุนามสกุล',
			'dutyrole.required' => 'กรุณาระบุตำแหน่ง',
			'dutytelno.required' => 'กรุณาระบุเบอร์ติดต่อ',
			'dutyemail.required' => 'กรุณาระบุอีเมล',
			'dutyemail.email' => 'รูปแบบอีเมลไม่ถูกต้อง',
			'dutyemail.unique' => 'อีเมลที่ระบุมีในระบบแล้ว',
			'dutyname.unique' => 'ชื่อผู้รับผิดชอบที่ระบุมีในระบบแล้ว',
		);

		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$policyduty = new PolicyDuty;

			// $chk_action = $action->checkPolicy($action_content);
			// if($chk_action)
			// {
				$policyduty->fname =  $data['dutyname'];
				$policyduty->lastname =  $data['dutylname'];
				$policyduty->position =  $data['dutyrole'];
				$policyduty->email =  $data['dutyemail'];
				$policyduty->tel =  $data['dutytelno'];
				$policyduty->duty_type =  $data['duty_type'];
				$policyduty->save();
				return Redirect::to('policyduty/list')->with('success','บันทึกสำเร็จ');	
			// }else
			// {
			// 	return Redirect::route('actionadd')->with('warning','มีชื่อการกระทำในระบบแล้ว');	
			// }
			
		}else{
			// $errors = $validator->messages();
			return Redirect::to('policyduty/add')->withErrors($validator);
		}
	}

	public function policyDutyEdit($id)
	{
		$rs = PolicyDuty::find($id);
		return View::make('policyduty.edit')
				->with('rs',$rs)
				->with('duty_type',$this->type_duty);
	}

	public function policyDutyEdited($id)
	{
		Input::flash();
		$data = Input::all();

		$rules = array(
			'dutyname' => array('required'), 
			'dutylname' => array('required'), 
			'dutyrole' => array('required'), 
			'dutytelno' => array('required'), 
			
		);


		// Build the custom messages array.
		$messages = array(
			'dutyname.required' => 'กรุณาระบุชื่อผู้รับผิดชอบ',
			'dutylname.required' => 'กรุณาระบุนามสกุล',
			'dutyrole.required' => 'กรุณาระบุตำแหน่ง',
			'dutytelno.required' => 'กรุณาระบุเบอร์ติดต่อ'
		);

		if($data['status'] == 'true')
			$status = true;
		else $status = false;

		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$policyduty = PolicyDuty::find($id);

			// $chk_action = $action->checkPolicy($action_content);
			// if($chk_action)
			// {
				$policyduty->fname =  $data['dutyname'];
				$policyduty->lastname =  $data['dutylname'];
				$policyduty->position =  $data['dutyrole'];
				$policyduty->tel =  $data['dutytelno'];
				$policyduty->duty_type =  $data['duty_type'];
				$policyduty->status = $status;

				$policyduty->save();
				return Redirect::to('policyduty/list')->with('success','แก้ไขสำเร็จ');	
			// }else
			// {
			// 	return Redirect::route('actionadd')->with('warning','มีชื่อการกระทำในระบบแล้ว');	
			// }
			
		}else{
			// $errors = $validator->messages();
			return Redirect::to('policyduty/edit/'.$id)->withErrors($validator);
		}
	}

	/**
	 * [policyDutyDel description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function policyDutyDel($id)
	{
		PolicyDuty::where('id','=',$id)->delete();
		return Redirect::to('policyduty/list')->with('success','ลบทิ้งสำเร็จ');	
	}

	/**
	 * [policyDutySearcy description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function policyDutySearch($keyword)
	{

		$per_page = Config::get('nhc/site.ole_perpage');
		$policy = new PolicyDuty();
		$rs = $policy->policyDutySearch($keyword,$per_page);
		
		return View::make('policyduty.search')->with('paginator',$rs);	
	}

	public function policyDutyUserinfo($id)
	{
		$rs = PolicyDuty::find($id);

		return View::make('policyduty.ajax_userinfo')->with('rs',$rs);
	}
}