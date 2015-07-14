<?php

class Purpose extends Eloquent {
	protected $guarded = array();

	protected $table = 'purpose';

	public static $rules = array();

	/**
	 * [getAllPurpose description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getAllPurpose($perPage)
	{	
		$purp = Purpose::where('purp_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		return $purp;
	}

	public function getPurposeByKeywork($keyword,$perPage)
	{
		if($keyword != 'all'){
			$purp = Purpose::whereRaw('purp_name like ?',array('%'.$keyword.'%'))
						->orderBy('id', 'asc')
						->paginate($perPage);
		}
		else{
			$purp = Purpose::where('purp_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		}		
						
		return $purp;
	}

	/**
	 * [checkPupose description]
	 * @param  [type] $purpose [description]
	 * @return [type]          [description]
	 */
	public function checkPurpose($purpose)
	{
		$rs = Purpose::where('purp_name','=',$purpose)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}
}
