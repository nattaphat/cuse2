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

    public static  function pathfile($id)
    {
        return UploadMedia::where('typeid','=',$id)->select('fullpath','training_id')->get();
    }
}
