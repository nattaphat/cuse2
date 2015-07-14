<?php

class PrivacyController extends BaseController {

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

	public $period_text= array(
					'1:day'=>'ระยะเก็บรักษาข้อมูล 1 วัน',
					'1:month'=>'ระยะเก็บรักษาข้อมูล 1 เดือน',
					'3:month'=>'ระยะเก็บรักษาข้อมูล 3 เดือน',
					'6:month'=>'ระยะเก็บรักษาข้อมูล 6 เดือน',
					'1:year'=>'ระยะเก็บรักษาข้อมูล 1 ปี',
					'3:year'=>'ระยะเก็บรักษาข้อมูล 3 ปี',
					'5:year'=>'ระยะเก็บรักษาข้อมูล 5 ปี',
					'7:year'=>'ระยะเก็บรักษาข้อมูล 7 ปี',
					'10:year'=>'ระยะเก็บรักษาข้อมูล 10 ปี',	
			);

	public $active_status = array(
		array('status'=>'no','text'=>'ไม่เปิดเผยต่อสาธารณะ'),
		array('status'=>'yes','text'=>'เปิดเผยสาธารณะ')
	);
	/**
	 * [privacyFrm show privacy page]
	 * @param  [integer] $id [user id]
	 */
	public function privacyFrm($id)
	{
		//get user's privacy by user id
		$priv_user = new Privacy;
		$user = $priv_user->getUserPrivacy($id);

		//var_dump($user);exit;
		//get user's info by user id
		$usernhc_obj = new Usernhc;
		$usernhc = $usernhc_obj->getUsernhcById($id);

		//get data relate with agency
		$agency_data = new AgencyData;
		$rs_agency_data = $agency_data->getDataByAgency($usernhc[0]->agency_id);
		// var_dump($rs_agency_data);//exit;

		//get agency's data privacy by agency id
		$priv_data = new DataPrivacy;
		$data = $priv_data->getDataPrivacy($usernhc[0]->agency_id); 
		 // var_dump($data);exit;
		
		//get all data name
		$data_table = Data::all();
		foreach ($data_table as $key => $value) {
			$raws[$value['id']][] = $value;
		}
		// var_dump($raws);exit;
		//get all period for each data_id 
		$period_data = RetainData::all();
		//var_dump($period_data);exit;
		
		$privacy_init = PrivacyInit::all()->toArray();

	

		$period= array(

				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 1 วัน',
					'value'=>'1:day'
					),
				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 1 เดือน',
					'value'=>'1:month'
					),
				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 3 เดือน',
					'value'=>'3:month'
					),
				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 6 เดือน',
					'value'=>'6:month'
					),
				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 1 ปี',
					'value'=>'1:year'
					),
				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 3 ปี',
					'value'=>'3:year'
					),
				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 5 ปี',
					'value'=>'5:year'
					),
				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 7 ปี',
					'value'=>'7:year'
					),
				array(
					'name'=>'ระยะเก็บรักษาข้อมูล 10 ปี',
					'value'=>'10:year'
					)
				
			);

		$rt = new RetainData();
		$rs = $rt->listRetain();

		//var_dump($period_data->toArray());exit;
        return View::make('privacy.privacy')
        			->with('priv_user',$user[0])
        			->with('priv_data',$data)
        			->with('user_info',$usernhc[0])
        			->with('src_table',$raws)
        			->with('period',$period)
        			->with('period_data',$period_data)
        			->with('active_status',$this->active_status)
        			->with('privacy_init',$privacy_init)
        			->with('retain_data',$rs)
        			->with('period_text',$this->period_text)
        			->with('agency_data',$rs_agency_data);
	}

	/**
	 * [privacyAddFrm description]
	 * @return [type] [description]
	 */
	public function privacyAddFrm()
	{
		return View::make('privacy.add');
	}

	/**
	 * [privacyEditFrm description]
	 * @return [type] [description]
	 */
	public function privacyEditFrm($id)
	{
		$rs = PrivacyInit::where('id','=',$id)->get()->toArray();
		return View::make('privacy.edit')->with('rs',$rs[0]);
	}

	public function privacyEdited($id)
	{
		Input::flash();
		$data = Input::all();
		$rules = array(
			'name_th' => array('min:5','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'name_th.min' => 'กรุณาระบุชื่อชื่อภาษาไทยอย่างน้อย :min ตัวอักษร',
			'name_th.required' => 'กรุณาระบุชื่อภาษาไทย',
		);

		$name_th = trim($data['name_th']);
		$init_val = $data['init_val'];

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);

		if ($validator->passes()) {
			$init = PrivacyInit::find($id);
			$init->name_th = $name_th;
			$init->init_value = $init_val;
			$init->save();
			return Redirect::to('privacy/'.Auth::user()->id )->with('success','บันทึกสำเร็จ');
		}else{
			// $errors = $validator->messages();
			return Redirect::to('privacy-edit/'.$id)->withErrors($validator);
		}
	}
	/**
	 * [privacySave description]
	 * @return [type] [description]
	 */
	public function privacySave()
	{
		Input::flash();
		$data = Input::all();
		$rules = array(
			'name_th' => array('min:5','required'), 
			'name_en' => array('min:5','required','alpha'), 
		);

		// Build the custom messages array.
		$messages = array(
			'name_th.min' => 'กรุณาระบุชื่อชื่อภาษาไทยอย่างน้อย :min ตัวอักษร',
			'name_th.required' => 'กรุณาระบุชื่อภาษาไทย',
			'name_en.min' => 'กรุณาระบุชื่อชื่อภาษาอังกฤษอย่างน้อย :min ตัวอักษร',
			'name_en.required' => 'กรุณาระบุชื่อภาษาอังกฤษ',
		);

		$name_th = trim($data['name_th']);
		$name_en = trim($data['name_en']);
		$removeable = true;
		$init_val = $data['init_val'];

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);

		if ($validator->passes()) {
			$init = new PrivacyInit;
			$rs_check = $init->checkPrivacyInit($name_en);
			if($rs_check)
			{
				$init->name_th = $name_th;
				$init->name_en = $name_en;
				$init->privacy_type = '1';
				$init->removeable =$removeable;
				$init->init_value = $init_val;
				$init->save();
				return Redirect::to('privacy/'.Auth::user()->id )->with('success','บันทึกสำเร็จ');
			}
			else
			{
				return Redirect::to('privacy-add')->with('warning','มีข้อมูลนี้อยุ่ในระบบแล้ว');	
			}
		}else{
			// $errors = $validator->messages();
			return Redirect::to('privacy-add')->withErrors($validator);
		}
	}

	/**
	 * [privacyDelete description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function privacyDelete($id)
	{
		PrivacyInit::where('id','=',$id)
			->delete();
		return Redirect::to('privacy/'.Auth::user()->id )->with('success','ลบทิ้งสำเร็จ');
	}

	/**
	 * [privacyInitList description]
	 * @param  [type] $privacy_type [description]
	 * @return [type]               [description]
	 */
	public function privacyInitList($privacy_type)
	{

		return View::make('privacy.search')
        			->with('privacy_type',$privacy_type);
	}

	/**
	 * [privacyUserSave save method for user privacy
	 * @param  [integer] $id [user id]
	 * @return [none]     [redirect to user privacy page]
	 */
	public function privacyUserSave($id)
	{
		$data = Input::all();
		//var_dump($data);exit;
		Privacy::where('userid','=',$id)
				->delete();
		$privacy = new Privacy;
		$privacy->userid = $id;
		$privacy->fname = (isset($data['fname'])) ? true : false;
		$privacy->lname = (isset($data['lname'])) ? true : false;
		$privacy->email = (isset($data['email'])) ? true : false;
		$privacy->telno = (isset($data['telno'])) ? true : false;
		$privacy->agency = (isset($data['agency'])) ? true : false;
		$privacy->ministry = (isset($data['ministry'])) ? true : false;
		$privacy->role = (isset($data['role'])) ? true : false;
		$privacy->save();
		
        return Redirect::to('/privacy/'.$id)->with('success','Your user privacy saved.');
		
	}

	/**
	 * [retainSearch description]
	 * @return [type] [description]
	 */
	public function retainSearch()
	{
		$rt = new RetainData();
		$rs = $rt->listRetain();
		return View::make('privacy.retainsearch')
        			->with('rs',$rs)
        			->with('period_text',$this->period_text);
	}

	/**
	 * [retainDataSave description]
	 * @return [type] [description]
	 */
	public function retainDataSave()
	{
		$data = Input::all();
		$startretaindate = $data['retainDate'];
		$data_id = $data['report_data_type'];
		$period = $data['retain_period'];

		list($year,$month,$day) = explode("-",$startretaindate);
		list($num,$type) = explode(":",$period);

		if($num != ''){
			if($type == 'day'){
				$time = date("Y-m-d H:i:s",mktime(0, 0, 0, $month,$day + $num,$year));
				$rt = new RetainData();
				$count = $rt->checkRetain($data_id);
				if($count > 0)
				{
					$rt_id = $rt->getRetainIdByDataId($data_id);
					
					$rt_edit = RetainData::find($rt_id[0]['id']);
					$rt_edit->data_id = $data_id;
					$rt_edit->period = $time;
					$rt_edit->retain_text = $period;
					$rt_edit->start_retain_date = $startretaindate;
					$rt_edit->save();
				}else
				{
					$rt->data_id = $data_id;
					$rt->period = $time;
					$rt->retain_text = $period;
					$rt->start_retain_date = $startretaindate;
					$rt->save();
				}

			}else if($type == 'month'){
				$time = date("Y-m-d H:i:s",mktime(0, 0, 0, $month + $num ,$day ,$year));
				$rt = new RetainData();
				$count = $rt->checkRetain($data_id);
				if($count > 0)
				{
					$rt_id = $rt->getRetainIdByDataId($data_id);
					
					$rt_edit = RetainData::find($rt_id[0]['id']);
					$rt_edit->data_id = $data_id;
					$rt_edit->period = $time;
					$rt_edit->retain_text = $period;
					$rt_edit->start_retain_date = $startretaindate;
					$rt_edit->save();
				}else
				{
					$rt->data_id = $data_id;
					$rt->period = $time;
					$rt->retain_text = $period;
					$rt->start_retain_date = $startretaindate;
					$rt->save();
				}
				
			}else{
				$time = date("Y-m-d H:i:s",mktime(0, 0, 0, $month,$day ,$year + $num));
				$rt = new RetainData();
				$count = $rt->checkRetain($data_id);
				if($count > 0)
				{
					$rt_id = $rt->getRetainIdByDataId($data_id);
					
					$rt_edit = RetainData::find($rt_id[0]['id']);
					$rt_edit->data_id = $data_id;
					$rt_edit->period = $time;
					$rt_edit->retain_text = $period;
					$rt_edit->start_retain_date = $startretaindate;
					$rt_edit->save();
				}else
				{
					$rt->data_id = $data_id;
					$rt->period = $time;
					$rt->retain_text = $period;
					$rt->start_retain_date = $startretaindate;
					$rt->save();
				}
				
			}
		}//

		return Redirect::to('/privacy/'.Auth::User()->id)->with('success','บันทึกสำเร็จ');	
	}

	/**
	 * [privacyDataSave save method for user privacy
	 * @param  [integer] $agency_id [agency id]
	 * @param  [integer] $user_id [user id]
	 * @return [none]     [redirect to user privacy page]
	 */
	public function privacyDataSave($agency_id,$user_id)
	{
		$data = Input::all();
		 //var_dump($data);exit;
		//Get all data type
		$data_type = Data::all();
		
		foreach ($data as $key => $value) {
			if($key != "_token")
			{
				list($data_id,$table_info) = explode(":",$key);
				($value=='on') ? $status = true : $status=false;
				// echo $status;
				// echo "<br />";	
				$priv_data['data_id'] = $data_id;
				$priv_data['agency_id'] = $agency_id;
				$priv_data['status'] = $status;
				$privacy_data[] = $priv_data;
			}
			
		}
		
		// var_dump($privacy_data);
		// exit;

		DataPrivacy::where('agency_id','=',$agency_id)
				->delete();
	
		DataPrivacy::insert($privacy_data);

        return Redirect::to('/privacy/'.$user_id)->with('success','Your data privacy saved.');	
	}
}