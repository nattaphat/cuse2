<?php

class ObligationController extends BaseController {

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
		$oblig = new Obligation();
		$per_page = Config::get('nhc/site.policy_perpage') ;
		$oblig = $oblig->getAllObligation($per_page);
	
		//return View::make('policy',array('policies' => $policies));
		

		if(Request::ajax())
        {
			// //$html = View::make('blog.post_comments', $data)->render();
			 $html = View::make('obligation.obligation')->with('paginator',$oblig)->render();
			 //return Response::json(array('html' => $html));
			return $html;
        }
        //return 'non-ajax';
        return View::make('obligation.obligation')->with('paginator',$oblig);
	}

	/**
	 * [addAction description]
	 */
	public function addAction(){
		return View::make('obligation.addobligation');
	}

	/**
	 * [editAction description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editAction($id){
		$obligation =  Obligation::find($id);
		return View::make('obligation.editobligation')->with('obligation_result',$obligation);
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
			//'username'=> 'awesome',
			'obligationname' => array('min:3','required')
		);

		// Build the custom messages array.
		$messages = array(
			'obligationname.required' => 'กรุณาระบุชื่อข้อผูกพัน',
			'obligationname.min' => 'กรุณาระบุชื่อข้อผูกพันอย่างน้อย :min ตััวอักษร'
		);

		$obl_name = trim($data['obligationname']);
		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);

		if ($validator->passes()) {
			// Normally we would do something with the data.
			$obligation = new Obligation;
			$rs_ckeck = $obligation->checkObligation($obl_name);

			if($rs_ckeck)
			{
				$obligation->obl_name = $obl_name;
				$obligation->save();
				return Redirect::to('obligation')->with('success','บันทึกสำเร็จ');
			}else
			{
				return Redirect::to('obligation-add')->with('warning','มีชื่อข้อผูกพันนี้ในระบบแล้ว');
			}
		}else{
			return Redirect::to('obligation-add')->withErrors($validator);
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
			'obligationname' => array('min:3','required'), 
		);

		// Build the custom messages array.
		$messages = array(
			'obligationname.required' => 'กรุณาระบุชื่อข้อผูกพัน',
			'obligationname.min' => 'กรุณาระบุชื่อข้อผูกพันอย่างน้อย :min ตััวอักษร'
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		$obl_name = trim($data['obligationname']);
		if ($validator->passes()) {
			$obligation = new Obligation;
			$rs_ckeck = $obligation->checkObligation($obl_name);

			if($rs_ckeck)
			{
				// Normally we would do something with the data.
				$obligation = Obligation::find($id);
				$obligation->obl_name = $data['obligationname'];
				$obligation->save();
				return Redirect::to('obligation')->with('success','ข้อผูกพันรหัส = '.$id.' แก้ไขสำเร็จ');
			}else
			{
				return Redirect::to('obligation-edit/'.$id)->with('warning','มีชื่อข้อผูกพันนี้ในระบบแล้ว');
			}

			
		}else{
			//$errors = $validator->messages();
			return Redirect::to('obligation-edit/'.$id)->withErrors($validator);
		}
	}

	/**
	 * [searchAction description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function searchAction($keyword){
		$obligation = new Obligation();
		$per_page = Config::get('nhc/site.obligation_perpage') ;
		$obligation = $obligation->getObligationByKeywork($keyword,$per_page);
		if(Request::ajax())
        {
			$html = View::make('obligation.searchobligation')->with('paginator',$obligation);
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
		Obligation::where('id','=',$id)
			->delete();
		return Redirect::to('obligation')->with('success','ข้อผูกพันรหัส = '.$id.' ลบทิ้งสำเร็จ');
	}
}