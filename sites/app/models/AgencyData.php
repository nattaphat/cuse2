<?php

class AgencyData extends Eloquent {
	protected $guarded = array();

	protected $table = 'agency_data';

	public static $rules = array();

	/**
	 * [getAgencyData description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function getAgencyData($id)
	{
		$rs = DB::select(DB::raw('
				select * 
				from data left join agency_data on data.id = agency_data.data_id 
				where agency_data.agency_id = :id
				order by data.id'
				),array('id'=>$id));

		return $rs;
	}

	/**
	 * [removeAgencyData description]
	 * @param  [type] $agency_id [description]
	 * @return [type]            [description]
	 */
	public function removeAgencyData($agency_id)
	{
		AgencyData::where('agency_id','=',$agency_id)
				->delete();
	}

	/**
	 * [getDataByAgency description]
	 * @return [type] [description]
	 */
	public function getDataByAgency($agency_id)
	{
		$rs = DB::select(DB::raw('
				select agency_id,data_id,data_name from agency_data ad 
				inner join agency a on (a.id = ad.agency_id)
				inner join data d on (ad.data_id = d.id )
				where a.id = :agency_id '
				),array('agency_id'=>$agency_id));
		return $rs;
	}

	/**
	 * [getAgenyByDataId description]
	 * @param  [type] $data_id [description]
	 * @return [type]          [description]
	 */
	public function getAgenyByDataId($data_id)
	{
		$rs = DB::select(DB::raw('
				select ad.agency_id,a.tname 
				from agency_data ad inner join agency a on (ad.agency_id = a.id)
				where ad.data_id = :data_id '
				),array('data_id'=>$data_id));
		foreach ($rs as $key => $value)
		{
			$arr_agency[] = $value->agency_id;
		}
		$user = new Usernhc();
		$rs_useragency = $user->getUserByAgencyId($arr_agency);
		// var_dump($rs_useragency);
		// var_dump($rs);exit;
		return $rs_useragency;
	}
}
