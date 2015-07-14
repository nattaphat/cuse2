<?php
class Ministry extends Eloquent
{
	public $timestamps = true; //for disable create_at and update_at 
	protected $guarded = array();

	protected $table = 'ministry';

	public static $rules = array();

	public function getAllMinistry($field=null)
	{
		$rs = Ministry::whereNotNull('ministry_id');
		if(isset($field)){
			$rs = $rs->get(array('ministry_id','full_th_name'))->toArray();
			return $rs;
		}
		else
		{
			return $rs->get();
		}
		
		
	}
}