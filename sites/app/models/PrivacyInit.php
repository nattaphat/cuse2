<?php

class PrivacyInit extends Eloquent {
	protected $guarded = array();

	protected $table = 'privacy_init';

	public static $rules = array();

	/**
	 * [checkPrivacyInit description]
	 * @param  [type] $name_en [description]
	 * @return [type]          [description]
	 */
	public function checkPrivacyInit($name_en)
	{
		$rs = PrivacyInit::where('name_en','=',$name_en)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}
}
