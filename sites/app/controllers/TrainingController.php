<?php

class TrainingController extends BaseController {

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
	public $result;
	public $viewname;
	public $xlsfilename;

	//for report
	public $userid;
	public $rolename;
	public $dt_start;
	public $dt_end;
	public $keyword;
    public $upload_path;
    public $uploadMediaObj;

    public function __construct()
    {
        $this->upload_path = public_path() . '/upload/training/'; // Worked perfect
        $this->uploadMediaObj = new UploadMedia();
    }

	public function getAllTraining()
	{
		$training = new Training();
		$per_page = Config::get('nhc/site.data') ;
		$datas = $training->getAllTraining($per_page);

		if(count($datas)>=1)
		{
			//echo 'morethan';exit;
			foreach ($datas as $key =>$val){
				$role_id = explode(',',$val->target);
				$rs = Roles::whereIn('id',$role_id)->get(array('role_name'))->toArray();
				$role_name[$key] = implode(",",array_flatten($rs));
			}
	        return View::make('train.train')
				->with('paginator',$datas)
				->with('relate_role',$role_name);
		}
		else
		{
			//echo 'lessthan';exit;
			return View::make('train.train')
				->with('paginator',null)
				->with('relate_role',null);
		}
		

	}

	/**
	 * [addTraining description]
	 */
	public function addTraining()
	{
		return View::make('train.add');
	}

	/**
	 * [saveTraining description]
	 * @param  string $train_id [description]
	 * @return [type]           [description]
	 */
	public function saveTraining($train_id="")
	{

		Input::flash();
		$data = Input::all();
        $files = Input::file('training_upload');


        /*
        if( count($files) > 0)
        {
            foreach($files as $key => $file)
            {
                $file->move($this->upload_path, $file->getClientOriginalName());
                $fullpath = $this->upload_path.$file->getClientOriginalName();
                $upload_media[] = array('typeid'=>'1', 'fullpath'=>$fullpath);
            }
        }*/

        //UploadMedia::insert($upload_media);

		$rules = array(
			'title' => array('required'),
			'description' => array('required'),
			'sdt' => array('required'),
			'edt' => array('required')
		);

		// Build the custom messages array.
		$messages = array(
			'title.required' => 'กรุณาระบุชื่อหลักสูตรอบรม',
			'description.required' => 'กรุณาระบุรายละเอียดหลักสูตรอบรม',
			'sdt.required' => 'กรุณาระบุวันเริ่มต้นที่สามารถเข้าร่วม',
			'edt.required' => 'กรุณาระบุวันสุดท้ายที่สามารถเข้าร่วม',
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);
		$title = trim($data['title']);
		if(isset($data['status']))
		{
			($data['status'] =='on') ? $status = true : $status = false ;
		}else
		{
			$status = false;
		}

		if ($validator->passes()) {
			if(!$train_id){//from add page
				if(count($data['role_id'] > 0))
				{
					$role_str =implode(",", $data['role_id']);
				}
				$training = new Training();
				$rs_check = $training->checkTitle($title);

				if($rs_check)
				{
					$start_date = $data['sdt'].':00';
					$end_date = $data['edt'].':00';

					$training->title = $title;
					$training->description = $data['description'];
					$training->target = $role_str;
					$training->status = $status;
					$training->closed_date = $end_date;
					$training->start_training_date = $start_date;
					$training->save();

                    $lastInsertId = $training->id;
                    if( count($files) > 0)
                    {
                        foreach($files as $key => $file)
                        {
                            $file->move($this->upload_path, $file->getClientOriginalName());
                            $fullpath = $this->upload_path.$file->getClientOriginalName();
                            $upload_media[] = array('typeid'=>'1', 'fullpath'=>$fullpath,'training_id'=>$lastInsertId);
                        }
                     }

                    UploadMedia::insert($upload_media);//save to media upload
					return Redirect::to('/training')->with('success','บันทึกสำเร็จ');
				}else
				{
					return Redirect::to('/training/add')->with('warning','มีชื่อหลัักสูตรนี้ในระบบแล้ว');
				}

			}else{//from edit page
				if(count($data['role_id'] > 0))
				{
					$role_str =implode(",", $data['role_id']);
				}
				$training = new Training();
				// $rs_check = $training->checkTitle($title);
				// if($rs_check)
				// {
					$start_date = $data['sdt'].':00';
					$end_date = $data['edt'].':00';

					$training = Training::find($train_id);
					$training->title = $data['title'];
					$training->description = $data['description'];
					$training->target = $role_str;
					$training->status = $status;
					$training->closed_date = $end_date;
					$training->start_training_date = $start_date;
					$training->save();

                    $lastInsertId = $training->id;
                    if( count($files) > 0)
                    {
                        foreach($files as $key => $file)
                        {
                            $file->move($this->upload_path, $file->getClientOriginalName());
                            $fullpath = $this->upload_path.$file->getClientOriginalName();
                            $upload_media[] = array('typeid'=>'1', 'fullpath'=>$fullpath,'training_id'=>$lastInsertId);
                        }
                     }

                    UploadMedia::insert($upload_media);//save to media upload

					return Redirect::to('/training')->with('success','แก้ไขสำเร็จ');
				// }else
				// {
				// 	return Redirect::to('/training/add')->with('warning','Existing title namle.');
				// }

			}
		}else{
			if(!$train_id)
			{//from add page
				return Redirect::to('/training/add')->withErrors($validator);
			}else
			{
				return Redirect::to('/training/edit/'.$train_id)->with('warning','กรุณากรอกข้อมูลตรงตามที่ระบบต้องการ');
			}

		}
	}

	/**
	 * [editTraining description]
	 * @param  [type] $train_id [description]
	 * @return [type]           [description]
	 */
	public function editTraining($train_id)
	{
		$roles = Roles::all();
        $rs = Training::find($train_id);
        $target_arr = explode(',',$rs->target);
		return View::make('train.edit')
					->with('result',$rs)
                    ->with('arr_target',$target_arr)
					->with('roles',$roles);
	}

	/**
	 * [delTraining description]
	 * @param  [type] $train_id [description]
	 * @return [type]           [description]
	 */
	public function delTraining($train_id)
	{
		Training::where('id','=',$train_id)
			->delete();

		return Redirect::to('/training')->with('success','ลบทิ้งหลักสูตรสำเร็จ');
	}

	/**
	 * [numCourse description]
	 * @return [type] [description]
	 */
	public function numCourse()
	{
		return Training::numTrainCourse();
	}

	/**
	 * [getListUserTraining description]
	 * @return [type] [description]
	 */
	public function getListUserTraining()
	{
		//var_dump(Training::all()->toArray());exit;
        $att_file = self::downloadFileDetail(1);
		$rs = Training::all();
		// var_dump($rs->toArray());exit;
		return View::make('train.trainlist')->with('results',$rs)->with('att_file',$att_file);
	}

    public function downloadFileDetail($id)
    {
        $all_attrachfile = UploadMedia::pathfile($id);
        foreach ($all_attrachfile as $key => $path) {
            $filename = substr(explode(',',basename($path))[0],0,-1);
             $dw_path = '/pro'.explode("/pro",$path->fullpath)[1];
            $paths[] = array( 'path'=>$dw_path,'filename'=>$filename,'training_id'=>$path->training_id);
        }

        return $paths;
    }

    public function downloadFile()
    {
        $path = Input::get('path');
        $filename = basename($path);
        $headers = array(
            'Content-Type' => 'application/pdf',
        );

        /*$headers = array(
              'Content-Type: application/pdf',
            );*/
        return Response::download($path,$filename, $headers);
    }

	/**
	 * [getSaveUserTraining description]
	 * @return [type] [description]
	 */
	public function getSaveUserTraining()
	{
		$data = Input::all();
		$userid = $data['userid'];
		$train_obj = new UserTraining();
		//var_dump($data);exit;
		if(isset($data['attend'])){

			foreach ($data['attend'] as $key => $value) {

				$countAtt = UserTraining::checkEditAttend($userid,$value);
				$train_id = $train_obj->getTrainIdByUserid($userid,$value);
				if( $countAtt > 0)
				{
					$course_obj = UserTraining::find($train_id[0]->id);
					$course_obj->userid = $userid;
					$course_obj->training_id = $value;
					$course_obj->attend = ($data['attend'][$key]) ? true :false;
					$course_obj->date_time_att = date('Y-m-d H:i:s');
					$course_obj->save();
				}else
				{
					$training_data['userid'] = $userid;
					$training_data['training_id'] = $value;
					$training_data['attend'] = true;
					$training_data['date_time_att'] = date('Y-m-d H:i:s');
					$datas_train[] = $training_data;	
				}
				
			}
			//var_dump($datas_train);exit;
			if(isset($datas_train))
			{
				if(count($datas_train > 0))
				{
					UserTraining::insert($datas_train);	
				}
			}
			return Redirect::to('/training/user/list')->with('success','ท่านได้ทำการเข้าร่วมหลักสูตรอบรมสำเร็จ');
		}else{
			return Redirect::to('/training/user/list')->withErrors('กรุณาเลือกหลักสูตร');
		}
	}

	/**
	 * [searchAction description]
	 * @param  [type] $keyword [description]
	 * @return [type]          [description]
	 */
	public function searchAction($keyword)
	{
		$training = new Training();
		$per_page = Config::get('nhc/site.perpage_training') ;
		$training_model = $training->getTrainByKeywork($keyword,$per_page);

		foreach ($training_model as $key =>$val){
			$role_id = explode(',',$val->target);
			$rs = Roles::whereIn('id',$role_id)->get(array('role_name'))->toArray();
			$role_name[$key] = implode(",",array_flatten($rs));
		}
		if(Request::ajax())
        {
			$html = View::make('train.searchtrain')
					->with('paginator',$training_model)
					->with('relate_role',$role_name);
			return $html;
        }
	}

	/**
	 * [getReport description]
	 * @param  [type] $trainid [description]
	 * @return [type]          [description]
	 */
	public function getReport($trainid)
	{
		$training = new Training();
		$per_page = Config::get('nhc/site.perpage_training') ;
		$report = $training->getReport($trainid,$per_page);

		return View::make('train.report')
					->with('paginator',$report);
	}

	/**
	 * [exportPdf description]
	 * @param  [type] $rs   [description]
	 * @param  [type] $type [description]
	 * @return [type]       [description]
	 */
	public function exportPdf($rs,$type)
	{
		if($type=='reportman')
		{

			// $html[] = '<html><body>';
			// $html[] = '<p>รายงานการเข้าอบรม</p>';
			// $html[] = '<table>';
			// $html[] = '		<tr class="background=\'red\' ">';
			// $html[] = '			<td>ชื่อหลักสูตร</td>';
			// $html[] = '			<td>รายละเอียด</td>';
			// $html[] = '			<td>การเข้าร่วม</td>';
			// $html[] = '			<td>วันที่สร้าง</td>';
			// $html[] = '			<td>วันที่สิ้นสุด</td>';
			// $html[] = '		</tr>';
			// $html[] = '		<tr>';
			// $html[] = '			<td>test</td>';
			// $html[] = '			<td>test</td>';
			// $html[] = '			<td>test</td>';
			// $html[] = '			<td>test</td>';
			// $html[] = '			<td>test</td>';
			// $html[] = '		</tr>';
			// $html[] = '</table>';
			// $html[] = '</body></html>';
			
			$html = View::make('train.reportman_pdf')
					->with('rs',$rs);

			return PDF::load($html, 'A4', 'portrait')->show('my_pdf');		
		}
		//$html = implode(" ", $html);

		//return PDF::load($html, 'A4', 'portrait')->show('my_pdf');
	}

	/**
	 * [exportXls description]
	 * @param  [type] $rs   [description]
	 * @param  [type] $type [description]
	 * @return [type]       [description]
	 */
	public function exportXls($rs,$type)
	{
		$this->result = $rs;
		if($type == 'reportman')
		{
			$this->viewname = 'train.reportman_xls';
			$this->xlsfilename = 'รายงานรายบุคคล';
			foreach ($rs as $key => $value) {
				$value->userid = $this->userid;
			}
		}
		else if($type == 'reportrole')
		{
			$this->viewname = 'train.reportrole_xls';
			$this->xlsfilename = 'รายงานตามบทบาท';
			foreach ($rs as $key => $value) {
				$value->rolename = $this->rolename;
			}
		}
		else if($type == 'reportdate')
		{
			$this->viewname = 'train.reportdate_xls';
			$this->xlsfilename = 'รายงานตามช่วงเวลา';

			foreach ($rs as $key => $value) {
				$value->dt_start = $this->dt_start;
				$value->dt_end = $this->dt_end;
			}

		}
		else if($type =='reportcourse')
		{
			$this->viewname = 'train.reportcourse_xls';
			$this->xlsfilename = 'รายงานตามชื่อหลักสูตรที่คนหา';

			foreach ($rs as $key => $value) {
				$value->keyword = $this->keyword;
			}
		}

		

		Excel::create($this->xlsfilename, function($excel) {
				$excel->sheet('report1', function($sheet) {

				$sheet->setStyle(array(
				    'font' => array(
				        'name'      =>  'TH Sarabun New',
				        'size'      =>  14,
				        'bold'      =>  false
				    )
				));
				$sheet->setAllBorders('thin');

				// Set width for multiple cells
				$sheet->setWidth(array(
				    'A'     =>  30,
				    'B'     =>  50,
				    'C'     =>  14.33,
				    'D'     =>  14.33,
				    'E'     =>  14.33,
				));

				$sheet->cells('A5:E5', function($cells) {
					$cells->setBackground('#cccccc');
					$cells->setFontSize(16);
					$cells->setFontWeight('bold');
					$cells->setAlignment('center');
					// Set all borders (top, right, bottom, left)
					$cells->setBorder(array(
					    'borders' => array(
					        'top'   => array(
					            'style' => 'solid'
					        ),
					        'left'   => array(
					            'style' => 'solid'
					        ),
					        'right'   => array(
					            'style' => 'solid'
					        ),
					        'bottom'   => array(
					            'style' => 'solid'
					        ),
					    )
					));
				});
				
				$sheet->loadView($this->viewname)
						->with('rs', $this->result);
			});
		})->export('xlsx','UTF-8');
	}


	/**
	 * [manReport description]
	 * @param  string $flag ['yes' for export to pdf or os on ,'' for pagination]
	 * @param  string $id [user id]
	 * @param  string $type [type of report]
	 * @return [type]       [description]
	 */
	public function manReport($id="",$flag="",$type="")
	{
		$training = new UserTraining();

		if ($id=='') //for show table list
		{	
			$usernhc = new Usernhc();
			$rs = $usernhc->getUsernhc('no');

			return View::make('train.reportman')
					->with('rs',$rs);

		}else if( ($id !='') AND ($flag =='') )//for pagination
		{
			
			$rs = $training->getUserTrainByUserId($id);
			return View::make('train.reportman_ajax')
					->with('rs',$rs)
					->with('userid',$id);
		}else //for export report
		{
			$rs = $training->getUserTrainByUserId($id);
			$this->userid = $id;
			$this->exportXls($rs,$type);
		}
	}

	/**
	 * [roleReport description]
	 * @param  string $roleid   [description]
	 * @param  string $flag [description]
	 * @param  string $type [description]
	 * @return [type]       [description]
	 */
	public function roleReport($roleid="",$flag="",$type="")
	{
		$training = new UserTraining();

		if ($roleid=='') //for show table list
		{	
			$roles = Roles::all();
			//var_dump($roles[0]);exit;
			return View::make('train.reportrole')
					->with('rs',$roles);

		}else if( ($roleid !='') AND ($flag =='') )//for pagination
		{
			
			$rs = $training->getUserTrainByRoleId($roleid);
			// var_dump($rs);exit;
			return View::make('train.reportrole_ajax')
					->with('rs',$rs)
					->with('role_id',$roleid);
		}else //for export report
		{
			$role_obj = new Roles();
			$this->rolename = $role_obj->getRoleName($roleid)->role_name;
			
			$rs = $training->getUserTrainByRoleId($roleid);
			$this->exportXls($rs,$type);
		}
	}

	/**
	 * [dateReport description]
	 * @param  string $dt_start [description]
	 * @param  string $dt_end   [description]
	 * @param  string $flag     [description]
	 * @param  string $type     [description]
	 * @return [type]           [description]
	 */
	public function dateReport($dt_start="",$dt_end="",$flag="",$type="")
	{
		$training = new UserTraining();

		if ( ($dt_start =='') AND ($dt_end =='') ) //for show table list
		{	

			return View::make('train.reportdate');
					//->with('rs',$roles);
		}

		else if( ($dt_start !='') AND ($dt_end !='') AND ($flag =='') )//for pagination
		{
			$rs = $training->getUserTrainByDate($dt_start,$dt_end);
			// echo $dt_start.'<br />';
			// echo $dt_end.'<br />';
			// var_dump($rs);exit;
			return View::make('train.reportdate_ajax')
					->with('rs',$rs)
					->with('dt_start',$dt_start)
					->with('dt_end',$dt_end);
					
		}
		else //for export report
		{

			$start = str_replace(array("_"),":",$dt_start);
            $start = str_replace(array("*")," ",$start);
            
            $end = str_replace(array("_"),":",$dt_end);
            $end = str_replace(array("*")," ",$end);

			$rs = $training->getUserTrainByDate($start,$end);			
			$this->dt_start =$start;
			$this->dt_end = $end;
			$this->exportXls($rs,$type);
			
		}
		
	}

	public function courseReport($keyword="",$flag="",$type="")
	{
		$training = new UserTraining();

		if ( ($keyword =='') AND ($type =='') ) //for show table list
		{	
			return View::make('train.reportcourse');
		}
		else if( ($keyword !='') AND ($flag =='') )//for pagination
		{
			$rs = $training->getUserTrainByCourseName($keyword);
			return View::make('train.reportcourse_ajax')
					->with('rs',$rs)
					->with('keyword',$keyword);
					
		}
		else //for export report
		{

			$rs = $training->getUserTrainByCourseName($keyword);			
			$this->keyword =$keyword;
			$this->exportXls($rs,$type);
			
		}
	}

}