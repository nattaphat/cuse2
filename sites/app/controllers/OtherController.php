<?php

/**
 * Created by IntelliJ IDEA.
 * User: yotzapon
 * Date: 7/15/15
 * Time: 7:16 AM
 */
class OtherController extends BaseController
{
    public $uploadTypeObj;
    public $uploadMediaObj;
    public $publicDocObj;
    public $upload_path;

    public function __construct()
    {
        $this->upload_path = public_path() . '/upload/proactive/'; // Worked perfect
        $this->uploadMediaObj = new UploadMedia();
        $this->uploadTypeObj = new UploadType();
        $this->publicDocObj = new PublicDoc();
    }
    public function checklist()
    {
        $rs = $this->uploadTypeObj->getUploadType();
        return View::make('other.other')
                ->with('rs',$rs);
    }

    public function proactiveCommitUpload($upload_typeid)
    {
        $rs = $this->uploadTypeObj->getUploadTypeById($upload_typeid);
        $media = $this->uploadMediaObj->getDocument();

        return View::make('other.proac_commit_upload')
            ->with('rs',$rs->toArray()[0])
            ->with('alldoc',$media)
            ->with('typeid',$upload_typeid);
    }

    public function proactiveCommitUploadSave()
    {
        $file_id = Input::get('file_id');
        $files = Input::file($file_id);
        $upload_typeid = Input::get('type_id');
        $document_description = Input::get('doc_des');

        if( count($files) > 0)
        {
            foreach($files as $key => $file)
            {
                $file->move($this->upload_path, $file->getClientOriginalName());
                $fullpath = $this->upload_path.$file->getClientOriginalName();
                $upload_media[] = array(
                                'typeid'=>$upload_typeid,
                                'fullpath'=>$fullpath,
                                'document_status'=>true,
                                'description'=>$document_description);
            }
        }

        UploadMedia::insert($upload_media);//save to media upload
        return Redirect::to('other/proactive/commitment/'.$upload_typeid)
            ->with('success','อัพโหลดไฟล์สำเร็จ');
    }

    public function proactiveCommitEditDocstatus()
    {
        $docname = basename(Input::get('docpath'));
        $docstatus = Input::get('doc_status');
        $typeid = Input::get('$typeid');

        $this->uploadMediaObj->editDocStatus($typeid,$docname,$docstatus);
        return Redirect::to('other/proactive/commitment/2')
            ->with('success','บันสำเร็จ');

    }

    public function publicdoc()
    {
        $rs = $this->publicDocObj->getAllDoc();
        foreach ($rs as $key => $val)
        {
             $datas[$val->name ][] = $val;
        }
        return View::make('other.publicdoc')
                ->with('rs',$datas);
    }

    public function addChkFrm()
    {
        return View::make('other.addchecklist');
    }

    public function checkExistChkList($th_name,$en_name)
	{
		$rs = UploadType::where('name','=',$th_name)
                    ->orWhere('eng_name','=',$en_name)
                    ->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}

    public function saveChkList()
    {
        $chkname_th = Input::get("chkname_th");
        $chkname_en = Input::get("chkname_en");

        $data = Input::all();

        $rules = array(
			'chkname_th'=> array('min:3','required'),
			'chkname_en' => array('min:3','required')
		);

		// Build the custom messages array.
		$messages = array(
			'chkname_th.required' => 'กรุณาระบุชื่อรายการเอกสารภาษาไทย',
			'chkname_th.min' => 'กรุณาระบุชื่อเอกสารอย่างน้อย :min ตััวอักษร',
            'chkname_en.required' => 'กรุณาระบุชื่อรายการเอกสารภาษาอังกฤษ',
            'chkname_en.min' => 'กรุณาระบุชื่อเอกสารอย่างน้อย :min ตััวอักษร',
		);

		// Create a new validator instance.
		$validator = Validator::make($data, $rules,$messages);

        if ($validator->passes()) {
			// Normally we would do something with the data.
            $chk_existing = self::checkExistChkList($chkname_th,$chkname_en);
            if($chk_existing){
                $this->uploadTypeObj->name = $chkname_th;
                $this->uploadTypeObj->eng_name = $chkname_en;
                $this->uploadTypeObj->save();
                return Redirect::to('chklist-add')->with('success','บันทึกสำเร็จ');
            }else{
                return Redirect::to('chklist-add')->with('warning','มีชื่อข้อในระบบแล้ว');
            }
		}else{
            return Redirect::to('chklist-add')->withErrors($validator);
		}

    }
}