<?php

/**
 * Created by IntelliJ IDEA.
 * User: yotzapon
 * Date: 7/15/15
 * Time: 1:59 PM
 */


class UploadType extends Eloquent {
	protected $guarded = array();
	public $timestamps = false;
	protected $table = 'upload_type';
    protected $primaryKey = 'id';
	public static $rules = array();

    public function getUploadType($ignore = array(1))
    {
        $rs = UploadType::whereNotIn('id',$ignore)->get();
        return $rs;
    }

    public function getUploadTypeById($typeid)
    {
        $rs = UploadType::where('id','=',$typeid)->get();
        return $rs;
    }
}