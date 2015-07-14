<?php

class Obligation extends Eloquent {
	protected $guarded = array();

	protected $table = 'obligation';

	public static $rules = array();

	/**
	 * [getAllObligation description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getAllObligation($perPage)
	{	
		$obl = Obligation::where('obl_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		return $obl;
	}

	/**
	 * [getObligationByKeywork description]
	 * @param  [type] $keyword [description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getObligationByKeywork($keyword,$perPage)
	{
		if($keyword != 'all'){
			$oblig = Obligation::whereRaw('obl_name like ?',array('%'.$keyword.'%'))
						->orderBy('id', 'asc')
						->paginate($perPage);
		}
		else{
			$oblig = Obligation::where('obl_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		}		
						
		return $oblig;
	}

	/**
	 * [checkObligation description]
	 * @param  [type] $oblig [description]
	 * @return [type]        [description]
	 */
	public function checkObligation($oblig)
	{
		$rs = Obligation::where('obl_name','=',$oblig)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}
}
