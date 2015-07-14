<?php

class RequestDataController extends BaseController {

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
	public $req_status = array(
          array('status'=>'yes','text'=>'ยินยอมการร้องขอ'),
          array('status'=>'no','text'=>'อยู่ระหว่างพิจารณา')
          );
	/**
	 * [queryFrmAction show form query data by use ajax]
	 * @return [type] [description]
	 */
	public function reqFrmAction()
	{
		return View::make('requestdata.data')
					->with('all_data',QueryData::getDataType())
					->with('all_agency',Agency::all())
					->with('relate_policy',Policy::getPolicyByUserId())
					->with('relate_condition',QueryData::getCondtionType())
					;
	}

	public function getDataByAgencyId($agencycode)
	{
		$agency_obj = new Agency();
		$rs_agency_info = $agency_obj->getAgecyInfoByCode($agencycode);
		
		$agencydata_obj = new DataPrivacy();
		$rs = $agencydata_obj->getDataByAgencyId($rs_agency_info[0]->id);

		return View::make('requestdata.ajax_databyagency')
				->with('all_data',$rs);
	}

	/**
	 * [reqSaveAction description]
	 * @return [type] [description]
	 */
	public function reqSaveAction()
	{
		$data = Input::all();
		// var_dump($data);exit;
		
		$req = new RequestData();
		$qry_data = new QueryData();

		$dataid = $data['dataid'];
		$conid = $data['condid'];
		$agencycode = $data['agencyid'];
		$req_type = $data['req_type'];
		
		$rs_check = $qry_data->checkNumData($agencycode,$dataid);
		
		if($rs_check > 0)
		{
			$numReq = $req->numReqData(
								$dataid,
								$conid,
								$agencycode,
								$req_type
								);//Count reqest data

			//var_dump($rs['data']);
			// var_dump($numReq);
			// exit;
			if($numReq == 0)
			{
				$req->data_id = $data['dataid'];
				$req->cond_id = $data['condid'];
				$req->agency_code = $data['agencyid'];
				$req->req_status = FALSE;
				$req->send_userid = Auth::getUser()->id;
				$req->send_agencyid = Auth::getUser()->agency_id;
				$req->downloaded = FALSE;
				$req->req_type = $data['req_type'];
				$req->save();

				return '<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
				        <strong>เสร็จสิ้น</strong> คำร้องขอของท่านได้รับการบันทึกเรียบร้อยแล้ว.
				      </div>';
			}else
			{
				return '<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
				        <strong>ผิดพลาด</strong> ไม่พบข้อมูลที่ท่านร้องขอในฐานข้อมูล หรือท่านได้ทำการร้องขอข้อมูลนี้ไปแล้ว.
				      </div>';
			}
		}
		else
		{
			return '<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
				        <strong>ผิดพลาด</strong> ไม่พบข้อมูลที่ท่านร้องขอในฐานข้อมูล.
				      </div>';
		}
		

	}

	public function reqListAction()
	{
		$req_info = new RequestData();
		$rs_reqinfo = $req_info->getReqAndAppDataInfo();
		$req_list = $rs_reqinfo['req']['req_data']; 
		
		//var_dump(RequestDataType::find(1)->type_name);exit;
		//var_dump($req_approve->toArray());
		return View::make('requestdata.reqlist')->with('req_data',$req_list);
	}
	
	public function reqListEditAction($id)
	{
		$req_info = new RequestData();
		$rs_reqinfo = $req_info->getReqDataById($id);
		// $req_list = $rs_reqinfo['req']['req_data']; 
		// $req_approve = $rs_reqinfo['approve']['approve_data']; 
		//var_dump($rs_reqinfo['req_data'][0]);
		return View::make('requestdata.reqlistedit')
					->with('req_data',$rs_reqinfo['req_data'])
					->with('req_status',$this->req_status);	
	}

	public function reqListSaveAction($id)
	{
		$data =Input::all();
		//var_dump($data);exit;
		$rules = array(
			'req_status' => array('required')
		);

		// Build the custom messages array.
		$messages = array(
			'req_status.required' => 'กรุณาตรวบสอบสถานะการร้องขอ.'
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);

		if ($validator->passes()) {
			// Normally we would do something with the data.
			$req = RequestData::find($id);
			$req->comment = $data['req_comment'];
			$req->req_status = (($data['req_status'] == 'yes') ? True : False);
			$req->app_userid = Auth::getUser()->id;
			$req->save();
			return Redirect::to('/reqdata/reqlist')->with('success','บันทึกคำขอสำเร็จ');
		}else{
			//$errors = $validator->messages();
			return Redirect::to('/reqdata/reqlist/edit/'.$id)->withErrors($validator);
		}
	}

	public function resultListAction()
	{
		$req_info = new RequestData();
		$rs_reqinfo = $req_info->getReqAndAppDataInfo();
		$req_approve = $rs_reqinfo['approve']['approve_data']; 
		
		//var_dump($approve_agency);exit;
		//var_dump($req_approve->toArray());
		return View::make('requestdata.resultreqlist')->with('approve_data',$req_approve);
	}

	/**
	 * [resultRequestDownload description]
	 * @param  [type] $req_id [description]
	 * @return [type]         [description]
	 */
	public function resultRequestDownload($req_id)
	{
		$download_paht = Config::get('nhc/site.download_paht') ;// /Library/WebServer/Documents/lv_nhc/sites/app/downlad/
		$data = QueryData::queryDataNHCAll($req_id);
		$req_info = RequestData::find($req_id);
		
		$filename = Carbon::createFromTimeStamp(strtotime($req_info['updated_at']))->format('Y_m_d');
		$path = $download_paht.$req_info['agency_code'];

		$full_path_file = $path.'/'.$req_info['agency_code'].'_'.$filename.'.csv';

		if (!file_exists($full_path_file)) {
			system('mkdir -p '.$path);
			//echo $path;exit; //
		}

		if(file_exists($full_path_file))
		{
			//$full_path_file = $path.'/'.$req_info['agency_code'].'_'.$filename.'.csv';
			$req_info->downloaded = true;
			$req_info->save();
			return Response::download($full_path_file, $req_info['agency_code'].'_'.$filename.'.csv', array('content-type' => 'text/csv'));
		}
		else
		{
			$file = fopen($full_path_file, 'w');
		    foreach ($data as $row) {
				fputcsv($file, (array)$row);
		    }
			fclose($file);
			$req_info->downloaded = true;
			$req_info->save();
			return Response::download($full_path_file, $req_info['agency_code'].'_'.$filename.'.csv', array('content-type' => 'text/csv'));
		}
	}

	/**
	 * [reqListSearchAction description]
	 * @param  [type] $keyword  [description]
	 * @param  [type] $req_type [description]
	 * @return [type]           [description]
	 */
	public function reqListSearchAction($keyword)
	{
		$req = new RequestData();
		$per_page = Config::get('nhc/site.policy_perpage') ;
		$req_list = $req->getReqDataByKeywork($keyword,$per_page);
		if(Request::ajax())
        {
			$html = View::make('requestdata.searchreqlist')->with('paginator',$req_list);
			return $html;
        }
	}

	/**
	 * [resultSearchAction description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function resultSearchAction($keyword)
	{
		$req = new RequestData();
		$per_page = Config::get('nhc/site.policy_perpage') ;
		$rs_list = $req->getResultByKeywork($keyword,$per_page);

		//var_dump($rs_list);

		if(Request::ajax())
        {
			$html = View::make('requestdata.searchresultreqlist')->with('paginator',$rs_list);
			return $html;
        }
	}

}