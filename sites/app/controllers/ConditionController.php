<?php

class ConditionController extends BaseController {

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
	 * [showAction description]
	 * @return [type] [description]
	 */
	public function showAction()
	{
		$condition = new Condition();
		$per_page = Config::get('nhc/site.condition_perpage') ;
		$condition = $condition->getAllCondition($per_page);
	
		//return View::make('policy',array('policies' => $policies));
		

		if(Request::ajax())
        {
			// //$html = View::make('blog.post_comments', $data)->render();
			 $html = View::make('condition.condition')->with('paginator',$condition)->render();
			 //return Response::json(array('html' => $html));
			return $html;
        }
        //return 'non-ajax';
        return View::make('condition.condition')->with('paginator',$condition);
	}

	/**
	 * [addAction description]
	 */
	public function addAction(){
		return View::make('condition.addcondition');
	}

	/**
	 * [editAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editAction($id){
		$condition =  Condition::find($id);
		return View::make('condition.editcondition')->with('condition_result',$condition);
	}

	/**
	 * [saveAction description]
	 * @return [type] [description]
	 */
	public function saveAction(){
		Input::flash();

		$data = Input::all();
		// 'min:3' ensures that the value is greater than or equal to the parameter provided
		// 'max:32' ensure that the value is less than or equql to the parameter provided
		$rules = array(
			'condition_action'=> array('required'),
			'conditionname' => array('min:3','required')
		);

		// Build the custom messages array.
		$messages = array(
			'conditionname.required' => 'กรุณาระบุชื่อเงื่อนไข',
			'condition_action.required' => 'กรุณาระบุชื่อเงื่อนไขค้นหา',
			'conditionname.min' => 'กรุณาระบุชื่อเงื่อนไขอย่างน้อย :min ตัวอักษร.'
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);

		$cond_name = trim($data['conditionname']);
		$cond_action = trim($data['condition_action']);

		if ($validator->passes()) {
			// Normally we would do something with the data.
			$condition = new Condition;
			$rs_check = $condition->checkCondition($cond_name);
			if($rs_check)
			{
				$condition->cond_name = $cond_name;
				$condition->condition = $cond_action;
				$condition->save();
				return Redirect::to('condition')->with('success','บันทึกสำเร็จ');
			}else
			{
				return Redirect::to('condition-add')->with('warning','มีชื่อเงื่อนไขอยู่ในระบบแล้ว');
			}
			
		}else{
			//$errors = $validator->messages();
			return Redirect::to('condition-add')->withErrors($validator);
		}
	}

	/**
	 * [editedAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editedAction($id){
		//return 'test-->'.$id;
		Input::flash();
		$data = Input::all();

		// 'min:3' ensures that the value is greater than or equal to the parameter provided
		// 'max:32' ensure that the value is less than or equql to the parameter provided
		$rules = array(
			//'username'=> 'awesome',
			'conditionname' => array('min:3','required'),
			'condition_action'=> array('required'),
		);

		// Build the custom messages array.
		$messages = array(
			'conditionname.required' => 'กรุณาระบุชื่อเงื่อนไข',
			'condition_action.required' => 'กรุณาระบุชื่อเงื่อนไขค้นหา',
			'conditionname.min' => 'กรุณาระบุชื่อเงื่อนไขอย่างน้อย :min ตัวอักษร.'
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		$cond_name = trim($data['conditionname']);
		$cond_action = trim($data['condition_action']);

		if ($validator->passes()) {
			// Normally we would do something with the data.
			$condition = new Condition;
			$rs_check = $condition->checkCondition($cond_name);
			if($rs_check)
			{
				$condition = Condition::find($id);
				$condition->cond_name = $data['conditionname'];
				$condition->condition = $data['condition_action'];
				$condition->save();
				return Redirect::to('condition')->with('success','ชื่อเงื่อนไขรหัส = '.$id.' แก้ไขสำเร็จ');
			}else
			{
				return Redirect::to('condition-edit/'.$id)->with('warning','มีชื่อเงื่อนไขอยู่ในระบบแล้ว');
			}
		}else{
			//$errors = $validator->messages();
			return Redirect::to('condition-edit/'.$id)->withErrors($validator);
		}
	}

	/**
	 * [searchAction description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function searchAction($keyword){
		$condition = new Condition();
		$per_page = Config::get('nhc/site.condition_perpage') ;
		$condition = $condition->getConditionByKeywork($keyword,$per_page);
		if(Request::ajax())
        {
			//$html = View::make('blpolicyog.policy');
			$html = View::make('condition.searchcondition')->with('paginator',$condition);
			return $html;
        }
	}

	/**
	 * [delAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delAction($id)
	{
		Condition::where('id','=',$id)
			->delete();
		return Redirect::to('condition')->with('success','ชื่อเงื่อนไขรหัส = '.$id.' ลบทิ้งสำเร้จ');
	}
}