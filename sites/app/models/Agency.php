<?php

class Agency extends Eloquent {
	protected $guarded = array();

	protected $table = 'agency';

	public static $rules = array();


	public function getAllAgency()
	{
		$rs = DB::table('v_agency2')
				->whereNotNull('agency_id')
				->get();

		return $rs;
	}

	public static function getAgency($agency_code){
		if(isset($agency_code)){
			for($i=0;$i< count($agency_code);$i++){
				$temp[] = $agency_code[$i]->agency_id;
			}//end for

			$agency_code = "'" . implode("','", $temp) . "'"; //Displays 'A', 'B', 'C'
			
			$sql = "SELECT DISTINCT 
						a.id,a.tname AS agency_name,
						a.abbr,a.status AS agency_status,
						u.fname,
						u.id AS user_id
					FROM agency a
					LEFT JOIN data_privacy p ON (a.id = p.agency_id)
					LEFT JOIN usernhc u ON (u.agency_id = a.id)
					WHERE a.code IN ($agency_code)
					ORDER BY a.id
					";

			//echo $sql;exit;
			$rs = DB::select(DB::raw($sql));
			
			//var_dump($rs);exit;
			return $rs;	
		}//end if
		
	}

	public static function getAgecyInfoByCode($ag_code)
	{
		$rs = Agency::where('code','=',$ag_code)->get();
		return $rs;
	}

	public function checkAgency($code)
	{
		$rs = Agency::where('code','=',$code)->count();
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}
}
