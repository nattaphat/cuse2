<?php

class Data extends Eloquent {
	protected $guarded = array();

	protected $table = 'data';

	public static $rules = array();

	/**
	 * [getAllData description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getAllData($perPage)
	{	
		$role = Data::where('data_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		return $role;
	}
	
	/**
	 * [getAgencyByDataType retun set of agency id for satisfy with type id]
	 * @param  [string] $tablename [table name of data]
	 * @return [type]          [description]
	 */
	public static function getAgencyByDataType($tablename)
	{
		$agency_id = DB::connection('nhc_data')
					->table($tablename)
					->select('agency_id')
					->distinct()
					->get(array('agency_id'));
		
		//var_dump($agency_id);exit;			
		return $agency_id;
	}

	/**
	 * [getDataByKeywork description]
	 * @param  [type] $keyword [description]
	 * @param  [type] $perPage [description]
	 * @return [type]          [description]
	 */
	public function getDataByKeywork($keyword,$perPage)
	{
		if($keyword != 'all'){
			$data = Data::whereRaw('data_name like ?',array('%'.$keyword.'%'))
						->orderBy('id', 'asc')
						->paginate($perPage);
		}
		else{
			$data = Data::where('data_name','!=','')->orderBy('id', 'asc')->paginate($perPage);
		}		
						
		return $data;
	}

	/**
	 * [checkRole description]
	 * @param  [type] $role [description]
	 * @return [type]       [description]
	 */
	public function checkData($data,$tablename)
	{
		$rs = Data::where('data_name','=',$data)
					->where('table_name','=',$tablename)
					->count();
					
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}

	/**
	 * [getDataInfo get data info by data id]
	 * @param  [type] $dataId [description]
	 * @return [type]         [description]
	 */
	public static function getDataInfo($dataId)
	{
		return Data::whereIn('id',$dataId)->get();
	}

	/**
	 * [getDataByAgency get information about data on each agency depen on privacy data]
	 * @param  [type] $agency_id [description]
	 * @return [type]            [description]
	 */
	public function getDataByAgency($agency_id)
	{
		$rs = DB::table('v_databy_agency')
					->where('agency_id','=',$agency_id)
					->distinct()
					->orderBy('privacy_data','DESC')
					->get();	
		return $rs;
	}
}
