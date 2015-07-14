<?php

class ActionController extends BaseController {

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
		$action = new Action();
		$per_page = Config::get('nhc/site.action_perpage') ;
		$actions = $action->getAllAction($per_page);
        return View::make('action.action')->with('paginator',$actions);
	}

	/**
	 * [addAction description]
	 */
	public function addAction()
	{
		return View::make('action.addaction');
	}

	/**
	 * [editAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editAction($id)
	{
		$action = Action::find($id);
		return View::make('action.editaction')->with('action_result',$action);
	}

	/**
	 * [editedAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editedAction($id)
	{
		$data = Input::all();

		$rules = array(
			'actionname' => array('min:3','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'action.min' => 'กรุณาระบุชื่อการกระทำอย่างน้อย :min ตัวอักษร.',
			'action.required' => 'กรุณาระบุชื่อการกระทำ',
		);
		$action_content = trim($data['actionname']);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$action = new Action;

			$chk_action = $action->checkAction($action_content);
			if($chk_action)
			{
				$action = Action::find($id);
				$action->action_name = $action_content;
				$action->save();
				return Redirect::to('action')->with('success','แก้ไขชื่อการกระทำสำเร็จ');
			}else
			{
				return Redirect::to('action-edit/'.$id)->with('warning','มีชื่อการกระทำในระบบแล้ว');	
			}

			
		}else{
			// $errors = $validator->messages();
			return Redirect::to('action-edit/'.$id)->withErrors($validator);
		}
	}

	/**
	 * [delAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delAction($id)
	{
		Action::where('id','=',$id)->delete();
		return Redirect::to('action')->with('success','การกระทำรหัส = '.$id.' ลบทิ้งสำเร็จ');
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
			'actionname' => array('min:3','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'action.min' => 'กรุณาระบุชื่อการกระทำอย่างน้อย :min ตัวอักษร.',
			'action.required' => 'กรุณาระบุชื่อการกระทำ',
		);

		$action_content = trim($data['actionname']);
		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		if ($validator->passes()) {
			$action = new Action;

			$chk_action = $action->checkAction($action_content);
			if($chk_action)
			{
				$action->action_name =  $action_content;
				$action->save();
				return Redirect::route('actionshow')->with('success','บันทึกสำเร็จ');	
			}else
			{
				return Redirect::route('actionadd')->with('warning','มีชื่อการกระทำในระบบแล้ว');	
			}
			
		}else{
			// $errors = $validator->messages();
			return Redirect::route('actionadd')->withErrors($validator);
		}
	}

	/**
	 * [searchAction description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function searchAction($keyword)
	{
		$action = new Action();
		$per_page = Config::get('nhc/site.action_perpage') ;
		$action_model = $action->getActionByKeywork($keyword,$per_page);
		if(Request::ajax())
        {
			$html = View::make('action.searchaction')->with('paginator',$action_model);
			return $html;
        }
	}

}