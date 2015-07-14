<?php

class DataController extends BaseController {

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
	public function showDataAction()
	{
		$data = new Data();
		$per_page = Config::get('nhc/site.data_perpage') ;
		$datas = $data->getAllData($per_page);
        return View::make('data.data')->with('paginator',$datas);
	}

	/**
	 * [addDataAction description]
	 */
	public function addDataAction()
	{
		return View::make('data.adddata');
	}

	/**
	 * [editDataAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editDataAction($id)
	{
		$data = Data::find($id);
		return View::make('data.editdata')->with('data_result',$data);
	}

	/**
	 * [editedDataAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editedDataAction($id)
	{
		$data = Input::all();

		$rules = array(
			'dataname' => array('required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'dataname.required' => 'กรุณาระบุชื่อข้อมูล',
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$data_content = trim($data['dataname']);
			$data_tablename = trim($data['table_name']);
			$data_obj = Data::find($id);

			$rs_check = $data_obj->checkData($data_content,$data_tablename);
			if($rs_check)
			{
				$data_obj->data_name = $data_content;
				$data_obj->table_name = $data_tablename;
				$data_obj->save();
				return Redirect::to('data')->with('success','แก้ไขสำเร็จ');
			}else
			{
				return Redirect::to('data-edit/'.$id)->with('warning','มีชื่อข้อมูลอยู่ในระบบแล้ว');	
			}

		}else{
			// $errors = $validator->messages();
			return Redirect::to('data-edit/'.$id)->withErrors($validator);
		}
	}

	/**
	 * [delDataAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delDataAction($id)
	{
		
		Data::where('id','=',$id)->delete();
		return Redirect::to('data')->with('success','ชื่อข้อมูลรหัส = '.$id.' ลบทิ้งสำเร็จ');
	}

	/**
	 * [saveDataAction description]
	 * @return [type] [description]
	 */
	public function saveDataAction()
	{
		Input::flash();
		$data = Input::all();

		$rules = array(
			'dataname' => array('min:3','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'dataname.min' => 'กรุณาระบุชื่อข้อมูลอย่างนี้อย :min ตัวอักษร.',
			'dataname.required' => 'กรุณาระบุชื่อข้อมูล',
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$data_content = trim($data['dataname']);
			$data_tablename = trim($data['table_name']);
			$data_obj = new Data;
			$rs_check = $data_obj->checkData($data_content);
			if($rs_check)
			{
				$data_obj->data_name = $data_content;
				$data_obj->table_name = $data_tablename;
				$data_obj->save();
				return Redirect::to('data')->with('success','บันทึกสำเร็จ');
			}else
			{
				return Redirect::to('data-add')->with('warning','มีชื่อข้อมูลอยู่ในระบบแล้ว');	
			}
			
		}else{
			// $errors = $validator->messages();
			return Redirect::to('data-add')->withErrors($validator);
		}
	}

	/**
	 * [searchDataAction search data]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function searchDataAction($keyword)
	{
		$data = new Data();
		$per_page = Config::get('nhc/site.data_perpage') ;
		$data_model = $data->getDataByKeywork($keyword,$per_page);
		if(Request::ajax())
        {
			$html = View::make('data.searchdata')->with('paginator',$data_model);
			return $html;
        }
	}

	public function testDataAgency($type)
	{
		$test = Data::getAgencyByDataType($type);
		$rs = Agency::getAgency($test);
		print '<pre>';
		print_r($rs);
	}

}