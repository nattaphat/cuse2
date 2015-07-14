<?php

class PurposeController extends BaseController {

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
	public function showAction()
	{
		$purp = new Purpose();
		$per_page = Config::get('nhc/site.perpage') ;
		$purpose = $purp->getAllPurpose($per_page);
        return View::make('purpose.purpose')->with('paginator',$purpose);
	}

	/**
	 * [addAction description]
	 */
	public function addAction()
	{
		return View::make('purpose.addpurpose');
	}

	/**
	 * [editAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editAction($id)
	{
		$purp = Purpose::find($id);
		return View::make('purpose.editpurpose')->with('purpose_result',$purp);
	}

	/**
	 * [editedAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editedAction($id)
	{
		Input::flash();
		$data = Input::all();

		$rules = array(
			'purpose_name' => array( 'min:5','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'purposename.min' => 'กรุณาระบุชื่อวัตถุประสงค์อย่างน้อย :min ตัวอักษร',
			'purposename.required' => 'กรุณาระบุชื่อวัตถุประสงค์',
		);
		$purp_name = trim($data['purpose_name']);
		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$purpose = new Purpose();
			$rs_check = $purpose->checkPurpose($purp_name);
			if($rs_check)
			{	
				$purp = Purpose::find($id);
				$purp->purp_name = $data['purpose_name'];
				$purp->save();
				return Redirect::to('purpose')->with('success','บันทึกสำเร็จ');
			}
			else
			{
				return Redirect::to('purpose-edit/'.$id)->with('warning','มีข้อมูลนี้อยุ่ในระบบแล้ว');	
			}

			
		}else{
			// $errors = $validator->messages();
			return Redirect::to('purpose-edit/'.$id)->withErrors($validator);
		}
	}

	/**
	 * [delAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delAction($id)
	{
		Purpose::where('id','=',$id)
			->delete();
		return Redirect::to('purpose')->with('success','วัตถุประสงค์รหัส = '.$id.' ลบทิ้งสำเร็จ');
	}

	/**
	 * [saveAction description]
	 * @return [type] [description]
	 */
	public function saveAction()
	{
		Input::flash();
		$data = Input::all();
		$rules = array(
			'purpose_name' => array('min:5','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'purposename.min' => 'กรุณาระบุชื่อวัตถุประสงค์อย่างน้อย :min ตัวอักษร',
			'purposename.required' => 'กรุณาระบุชื่อวัตถุประสงค์',
		);
		$purp_name = trim($data['purpose_name']);
		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$purp = new Purpose;
			$rs_check = $purp->checkPurpose($purp_name);
			if($rs_check)
			{
				$purp->purp_name = $purp_name;
				$purp->save();
				return Redirect::to('purpose')->with('success','บันทึกสำเร็จ');
			}
			else
			{
				return Redirect::to('purpose-add')->with('warning','มีข้อมูลนี้อยุ่ในระบบแล้ว');	
			}
		}else{
			// $errors = $validator->messages();
			return Redirect::to('purpose-add')->withErrors($validator);
		}
	}

	/**
	 * [searchAction description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function searchAction($keyword)
	{
		$purpose = new Purpose();
		$per_page = Config::get('nhc/site.purpose_perpage') ;
		$purpose_model = $purpose->getPurposeByKeywork($keyword,$per_page);
		if(Request::ajax())
        {

			$html = View::make('purpose.searchpurpose')->with('paginator',$purpose_model);
			return $html;
        }
	}

}