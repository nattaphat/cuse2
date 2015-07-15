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
    public $upload_path;

    public function __construct()
    {
        $this->upload_path = public_path() . '/upload/proactive/'; // Worked perfect
        $this->uploadMediaObj = new UploadMedia();
        $this->uploadTypeObj = new UploadType();
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
        
    }
}