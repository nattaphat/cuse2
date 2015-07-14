<?php

class AgencyController extends BaseController {

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
	 * [agencyList description]
	 * @return [type] [description]
	 */
	public function agencyList()
	{
		$agency = new Agency();
		$rs = $agency->getAllAgency();
        return View::make('agency.list')->with('rs',$rs);
	}

	/**
	 * [agencyData description]
	 * @return [type] [description]
	 */
	public function agencyData()
	{
		$agency = new Agency();
		$rs_agency = $agency->getAllAgency();

		return View::make('agency.data')
				->with('agency',$rs_agency);
	}

	/**
	 * [agencyDataByAgencyId description]
	 * @return [type] [description]
	 */
	public function agencyDataByAgencyId($agency_id)
	{

		$agency = new AgencyData();
		$agency_data = $agency->getAgencyData($agency_id);
		
		$data = Data::All();
		return View::make('agency.ajax_data')
				->with('agency_data',$agency_data)
				->with('datas',$data);
	}

	/**
	 * [agencyDataFormAdd description]
	 * @return [type] [description]
	 */
	public function agencyDataFormAdd()
	{
		$data = Data::All();
		$agency = new Agency();
		$rs_agency = $agency->getAllAgency();
		return View::make('agency.add_agency_data')
			->with('data',$data)
			->with('agency',$rs_agency);
	}

	/**
	 * [agencyDataAdd description]
	 * @return [type] [description]
	 */
	public function agencyDataAdd()
	{
		$data = Input::all();
		//var_dump($data);exit;
		$rules = array(
		'agency_id' => 'required', 
		'data_id' => 'required', 
		);

		// Build the custom messages array.
		$messages = array(
			'agency_id.required' => 'กรุณาระบุชื่อหน่วยงาน',
			'data_id.required' => 'กรุณาระบุชื่อข้อมูล',
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {

			$agencydata_obj = new AgencyData();
			$agencydata_obj->removeAgencyData($data['agency_id']);

			foreach ($data['data_id'] as $key => $value) {
				$arrInsert = array(
                    	'agency_id' => $data['agency_id'],
                    	'data_id' => $value
                    );
				$arrInserts[] = $arrInsert;
			}

			$agencydata_obj->insert($arrInserts);
			return Redirect::route('agencydata')->with('success','บันทึกสำเร็จ');
			

		}else{
			// $errors = $validator->messages();
			return Redirect::back()->withErrors($validator);
		}
	}

	/**
	 * [agencyAdd description]
	 * @return [type] [description]
	 */
	public function agencyAdd($flag=null)
	{
		if(!$flag){
			$ministry = new Ministry();
			$ministry_list = $ministry->getAllMinistry('get');
			return View::make('agency.add')->with('ministry_list',$ministry_list);
		}
		else//Save to DB
		{
			$data = Input::all();

			$rules = array(
			'ministry_id' => 'required', 
			'department_id' => 'required', 
			);

			// Build the custom messages array.
			$messages = array(
				'ministry_id.required' => 'กรุณาระบุชื่อกระทรวง',
				'department_id.required' => 'กรุณาระบุชื่อกรม',
			);

			// Create a new validator instance.
			$validator = Validator::make($data, $rules,$messages);
			if ($validator->passes()) {

				$dep_obj = new Department();
				$agency = new Agency();

				$code = $dep_obj->getDepartmentCodeById($data['department_id']);
				$rs_check = $agency->checkAgency($code);

				if($rs_check)
				{
					$dep_info = $dep_obj->getDeparmentInfoById($data['department_id']);
					$agency->tname = $dep_info[0]['full_th_name'];
					$agency->ministry_id = $dep_info[0]['ministry_id'];
					$agency->status = true;
					$agency->code = $dep_info[0]['department_code'];
					$agency->save();
					return Redirect::to('agency/list')->with('success','บันทึกสำเร็จ');
				}else
				{
					return Redirect::to('agency/add')->with('warning','มีชื่อข้อมูลอยู่ในระบบแล้ว');	
				}

			}else{
				// $errors = $validator->messages();
				return Redirect::to('agency/add')->withErrors($validator);
			}
			
		
		}//end else
	}

	/**
	 * [agencyEdit description]
	 * @param  [type] $agency_id [description]
	 * @return [type]            [description]
	 */
	public function agencyEdit($agency_id)
	{

	} 

	/**
	 * [agencyDel description]
	 * @param  [type] $agency_id [description]
	 * @return [type]            [description]
	 */
	public function agencyDel($agency_id)
	{
		Agency::where('id','=',$agency_id)->delete();
		return Redirect::to('agency')->with('success','ชื่อข้อมูลหน่วยงานรหัส = '.$agency_id.' ลบทิ้งสำเร็จ');
	}

	public function getDepartment($ministry_id)
	{

		$dep = new Department();
		$rs = $dep->getDeaprtmentByMinistryId($ministry_id);

		return View::make('agency.department')->with('dep',$rs);
	}
}