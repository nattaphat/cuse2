<?php

class Action extends Eloquent {
	protected $guarded = array();

	protected $table = 'action';

	public static $rules = array();

	/**
	 * [getAllAction description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getAllAction($perPage)
	{	
		$action = Action::where('action_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		return $action;
	}

	/**
	 * [getActionByKeywork description]
	 * @param  [type] $keyword [description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getActionByKeywork($keyword,$perPage)
	{
		if($keyword != 'all'){
			$data = Action::whereRaw('action_name like ?',array('%'.$keyword.'%'))
						->orderBy('id', 'asc')
						->paginate($perPage);
		}
		else{
			$data = Action::where('action_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		}		
						
		return $data;
	}

	/**
	 * [checkData description]
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function checkAction($action)
	{
		$rs = Action::where('action_name','=',$action)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}

}
