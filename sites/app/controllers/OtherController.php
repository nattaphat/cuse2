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

    public function __construct()
    {
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
        return View::make('other.proac_commit_upload')->with('rs',$rs->toArray()[0]);
    }
}