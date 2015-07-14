<?php

class Condition extends Eloquent {
	protected $guarded = array();

	protected $table = 'condition';

	public static $rules = array();

	/**
	 * [getAllCondition description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getAllCondition($perPage)
	{	
		$condition = Condition::where('cond_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		return $condition;
	}

	/**
	 * [getConditionByKeywork description]
	 * @param  [type] $keyword [description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getConditionByKeywork($keyword,$perPage)
	{
		if($keyword != 'all'){
			$cond = Condition::whereRaw('cond_name like ?',array('%'.$keyword.'%'))
						->orderBy('id', 'asc')
						->paginate($perPage);
		}
		else{
			$cond = Condition::where('cond_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		}		
						
		return $cond;
	}

	/**
	 * [checkCondition description]
	 * @param  [type] $cond [description]
	 * @return [type]       [description]
	 */
	public function checkCondition($cond)
	{
		$rs = Condition::where('cond_name','=',$cond)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}
}
