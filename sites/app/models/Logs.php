<?php

class Logs extends Eloquent {
	protected $guarded = array();

	protected $table = 'logs';

	public static $rules = array();

	public function getRoleStat()
	{
		$rs = Logs::select( DB::raw("count (*) "),"role_id","role_name")
					->join("roles","roles.id",'=',"logs.role_id")
					->groupBy("role_id","role_name")
					->orderBy("role_id")
					->get();
		return $rs;
	}

	public function getDataStat()
	{
		$rs = Logs::select( DB::raw("count (*) "),"data_id","data_name")
				->join("data","data.id",'=',"logs.data_id")
				->groupBy("data_id","data_name")
				->orderBy("data_id")
				->get();
		return $rs;
	}

	public function getReport($type,$sdate,$edate,$per_page)
	{
		list($type,$id) = explode('_',$type);
		$sdate = $sdate.':00';
		$edate = $edate.':00';
		// echo $sdate;
		// echo '<br>';
		// echo $edate;
		$rs = Logs::where(DB::raw('last_visit::text'),'>',$sdate)
				->where(DB::raw('last_visit::text'),'<',$edate)
				->join("data","data.id",'=',"logs.data_id")
				->join("roles","roles.id",'=',"logs.role_id")
				->join("v_user_info","v_user_info.user_id",'=',"logs.userid")
				->orderBy("last_visit",'DESC');

		if($type == 'role')
		{
			$rs = $rs->where('roles.id','=',$id)->paginate($per_page);
		}
			//$rs = $rs->where('roles.id','=',$id)->get()->toArray();
		
		else
		{
			$rs = $rs->where('data.id','=',$id)->paginate($per_page);
		}
			//$rs = $rs->where('data.id','=',$id)->get()->toArray();
		//var_dump(count($rs));
		 return $rs;
	}

	public function getReportExport($type,$sdate,$edate)
	{
		list($type,$id) = explode('_',$type);
		$sdate = $sdate.':00';
		$edate = $edate.':00';
		// echo $sdate;
		// echo '<br>';
		// echo $edate;
		$rs = Logs::where(DB::raw('last_visit::text'),'>',$sdate)
				->where(DB::raw('last_visit::text'),'<',$edate)
				->join("data","data.id",'=',"logs.data_id")
				->join("roles","roles.id",'=',"logs.role_id")
				->join("v_user_info","v_user_info.user_id",'=',"logs.userid")
				->orderBy("last_visit",'DESC');

		if($type == 'role')
		{
			$rs = $rs->where('roles.id','=',$id)->get();
		}
			//$rs = $rs->where('roles.id','=',$id)->get()->toArray();
		
		else
		{
			$rs = $rs->where('data.id','=',$id)->get();
		}
			//$rs = $rs->where('data.id','=',$id)->get()->toArray();
		//var_dump(count($rs));
		 return $rs;
	}
}
