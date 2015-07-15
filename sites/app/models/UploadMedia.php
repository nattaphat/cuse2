<?php

/**
 * Created by IntelliJ IDEA.
 * User: yotzapon
 * Date: 7/15/15
 * Time: 9:28 AM
 */
class UploadMedia extends Eloquent
{
    protected $guarded = array();
    protected $table = 'upload_media';
    protected $primaryKey = 'typeid';
    public static $rules = array();

    public $timestamps = false;

    public static  function pathfile($id)
    {
        return UploadMedia::where('typeid','=',$id)->select('fullpath','training_id')->get();
    }

    public function getDocument($ignore = array(1))
    {
        $rs = UploadMedia::whereNotIn('typeid',$ignore)->get();
        return $rs;
    }

    public function editDocStatus($typeid,$docname,$docstatus)
    {
        if($docstatus == 'on')
            $doc = true;
        else
            $doc = false;

        UploadMedia::where('typeid','=',$typeid)
            ->where('fullpath', 'LIKE', '%'.$docname.'%')
            ->update(['document_status' => false]);
            //->save();

    }
}
