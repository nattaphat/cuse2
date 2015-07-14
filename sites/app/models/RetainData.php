<?php

class RetainData extends Eloquent {
	protected $guarded = array();

	public $timestamps = false;

	protected $table = 'retain_data';

	public static $rules = array();

	public function listRetain()
	{
		$rs = RetainData::whereNotNull('retain_data.id')
				->join('data','data.id','=','retain_data.data_id')
				->orderBy('retain_data.data_id','ASC')
				->get();
		return $rs;
	}

	public function checkRetain($id)
	{
		$rs = RetainData::where('data_id','=',$id)
						->count();
		return $rs;
	}

	public function getRetainIdByDataId($dataid)
	{
		$rs = RetainData::where('data_id','=',$dataid)
						->get(array('id'));
		return $rs;
	}
}
