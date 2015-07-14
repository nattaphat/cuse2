<?php

class Dam extends Eloquent {
	protected $guarded = array();

	protected $table = 'dam_damdaily';

	public static $rules = array();

	protected $connection = 'nhc_data';
	//$users = DB::connection('nhc_data')->select(...);
	
	/**
	 * [getDam fetch dam data]
	 * @param  [type] $perPage [limit for pager]
	 * @param  [type] $limit   [limit result]
	 * @return [array]          [dam data]
	 */
	public function getDam($perPage,$limit)
	{	
		
	}

	/**
	 * [getDam3Day fetch dam data 3 day]
	 * @param  [type] $perPage [limit for pager]
	 * @param  [type] $limit   [limit result]
	 * @return [array]          [dam data]
	 */
	public function getDam3Day($perPage,$limit)
	{	
		
	}

	/**
	 * [getDam7Day fetch dam data 7 day]
	 * @param  [type] $perPage [limit for pager]
	 * @param  [type] $limit   [limit result]
	 * @return [array]          [dam data]
	 */
	public function getDam7Day($perPage,$limit)
	{	
		
	}

}
