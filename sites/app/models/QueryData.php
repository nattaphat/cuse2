<?php

class QueryData extends Eloquent {
	protected $guarded = array();

	protected $table = 'v_querydata_metadata_v3';

	public static $rules = array();


	/**
	 * [getDataTypeByRoleId retun set of data type at the data privacy is TRUE]
	 * @return [array]          [collection of data type]
	 */
	public static function getDataType()
	{
		$dataid_str = DataPrivacy::getData();
		// print '<pre>';
		// print_r($dataid_str);exit;
		$datatype = QueryData::whereIn('data_id',$dataid_str)
					->where('policy_status','=',true)
					->distinct()
					->get(array('data_name','data_id'));
					//->toSql();
		//var_dump($datatype->toArray());exit;
		return $datatype;
	}

	/**
	 * [getCondtionType retun set of conditoni at the data privacy is TRUE]
	 * @return [array]          [collection of data type]
	 */
	public static function getCondtionType()
	{
		$dataid_str = DataPrivacy::getData();
		$condition = QueryData::whereIn('data_id',$dataid_str)
					->where('policy_status','=',true)
					->where('condition','!=',"")
					->distinct()
					->orderBy('cond_id', 'ASC')
					->get(array('cond_id','cond_name'));
					//->toSql();
		//var_dump($dataid_str);
		//var_dump($condition);exit;
		return $condition;
	}

	public static function getCondtionTypeV2(array $policy_id)
	{

		$rs = DB::table('v_data_privacy')
				->whereIn('policy_id',$policy_id)
				->where('privacy','=',true)
				->where('policy_status','=',true)
				->select('cond_id','cond_name')
				->distinct()
				->orderBy('cond_id', 'ASC')
				->get();
		return $rs;

	}


	public function checkNumData($agency_code,$data_id)
	{
		$data_obj = new Data();
		$arr_data[] = $data_id;
		$data_info = $data_obj->getDataInfo($arr_data);
		$table_name = $data_info[0]->table_name;
		list($table,$field,$datefield) = explode("-",$table_name);

		$rs = DB::connection('nhc_data')
				->table($table)
				->where('agency_id','=',$agency_code)
				->count();
		return $rs;
	}

	/**
	 * [queryDataNHC query data from view ]
	 * @param  [integet] $dataid   [data id]
	 * @param  [integet] $condition   [condition  relate with policy]
	 * @param  [integet] $flag     [flag 'yes' is all agency 'no' select agency]
	 * @param  [integet] $agencyid [agency id]
	 * @return [array]           [collection of data]
	 */
	public function queryDataNHC(array $policy_id,$dataid,$cond_id,$flag,$agencyid)
	{	
		$user_id = Auth::getUser()->id;
		$today = date('Y-m-d H:i:s');

		try
		{
			// $rs = QueryData::where('action_id','!=',1)
			// 		->where('data_id','=',$dataid)
			// 		->where('cond_id','=',$cond_id)
			// 		->where('user_id','=',$user_id)
			// 		->where('period','>',$today)
			// 		->select('table_name','condition','period','agency_code')
			// 	 	->get();

			$rs = 	DB::table('v_data_privacy')
						->whereIn('policy_id',$policy_id)
						->where('privacy','=',true)
						->where('cond_id','=',$cond_id)
						->where('data_id','=',$dataid)
						->select('table_name','cond_name','cond_id','condition','period','agency_code')
						->get();
			foreach ($rs as $key => $val)
			{
				$arr_agency_code[] = $val->agency_code; // get all agency code
			}

			if (count($rs) > 0) 
			{ 
				$result = $rs[0];
				 // print '<pre>';
				 // print_r($result);exit;
					// $result 
					// array (size=4)
					//   'table_name' => string 'rainfall_sumary-rainfall_today-rainfall_today_date' (length=50)
					//   'condition' => string 'now()::date - 0' (length=15)
					//   'period' => string '2014-04-16' (length=10)
					//   'agency_code' => string '19012' (length=5)
					
				// var_dump($result);exit;
				
				$perPage = Config::get('nhc/site.perpage_datalist') ;
				$arrTableInfo = explode("-",$result->table_name);

				$tb_name = $arrTableInfo[0];
				$field = $arrTableInfo[1];
				$datefield = $arrTableInfo[2];
				//var_dump($arrTableInfo);exit;

				$tele_id ='telertn0001';

				if(Config::get('nhc/site.debug_data'))
				{
					$date = Config::get('nhc/site.debug.'.$datefield);
				}else
				{
					$date = DB::raw($result->condition);
				}

				if($flag == 'yes'){//all agency
					if($dataid == 11){//sea level
						
						$nhc_data = DB::connection('nhc_data')
								->table($tb_name)
								->where('tele_station_id','=',$tele_id)
								->where(DB::raw($datefield.'::date'),'=',$date)
								->where(DB::raw($datefield.'::date'),'<=',$result->period)
								->orderBy($field,'DESC')
								->select('*')
								->take(100)
								->get();
								//->paginate($perPage);
					}else{

						$nhc_data = DB::connection('nhc_data')
							->table($tb_name)
							->where(DB::raw($datefield.'::date'),'=',$date)
							->where(DB::raw($datefield.'::date'),'<=',$result->period)
							->orderBy($field,'DESC')
							->select('*')
							->take(100)
							->get();
						// var_dump($nhc_data);exit;
						// 	echo $date;
						// 	echo $result->period;
						// echo $nhc_data;exit;
					}
				}else{//flag = no
					if($dataid == 11){

						$nhc_data = DB::connection('nhc_data')
								->table($tb_name)
								->where('tele_station_id','=',$tele_id)
								->where('agency_id','=',$agencyid)
								->where(DB::raw($datefield.'::date'),'=',$date)
								->where(DB::raw($datefield.'::date'),'<=',$result->period)
								->orderBy($field,'DESC')
								->select('*')
								->take(100)
								->get();
						
								//->paginate($perPage);
					}else{
						$nhc_data = DB::connection('nhc_data')
							->table($tb_name)
							->where('agency_id','=',$agencyid)
							->where(DB::raw($datefield.'::date'),'=',$date)
							->where(DB::raw($datefield.'::date'),'<=',$result->period)
							->orderBy($field,'DESC')
							->select('*')
							->take(100)
							->get();
					}
				}
					
				$result_nhc['data'] = $nhc_data;
				// }else{
				// 	$result_nhc['data'] = array();	
				// }
				$result_nhc['info_querydata'] = $result;

				//var_dump($result_nhc['data']);exit;
				return $result_nhc;
			}
			else
			{ 
				return null; 
			}
			exit;
		 	
		}
		catch (Exception $e)
		{
		 throw new Exception( 'Something really gone wrong', 0, $e->getMessage());
		}
		
		
		
	}

	/**
	 * [queryDataNHC query data from view ] Get all data used by request data for download
	 * @param  [integet] $requestdata_id   [request data id]
	 * @return [array]           [collection of data]
	 */
	public static function queryDataNHCAll($requestdata_id)
	{	
		
		$results = RequestData::find($requestdata_id);
		$rs = QueryData::where('data_id','=',$results->data_id)
					->where('cond_id','=',$results->cond_id)
					->where('agency_code','=',$results->agency_code)
					->select('table_name','condition','period','agency_code')
				 	->get();

		$result_query = $rs[0];
	
		if($results->agency_code == '02005'){
			list($tb_name,$field,$datefield,$tele_id) = explode("-",$result_query->table_name);
			(Config::get('nhc/site.debug_db')) ?  $date = Config::get('nhc/site.debug.'.$datefield) : $date = DB::raw($result_query->condition);

			$nhc_data = DB::connection('nhc_data')
					->table($tb_name)
					->where('tele_station_id','=',$tele_id)
					->where('agency_id','=',$results->agency_code)
					->where(DB::raw($datefield.'::date'),'=',$date)
					->where(DB::raw($datefield.'::date'),'<=',$result_query->period)
					->orderBy($field,'DESC')
					->select('*')
					->take(100)
					//->toSql();
					->get();
		}else{
			list($tb_name,$field,$datefield) = explode("-",$result_query->table_name);
			(Config::get('nhc/site.debug_db')) ?  $date = Config::get('nhc/site.debug.'.$datefield) : $date = DB::raw($result_query->condition);
			//echo $date;
			$nhc_data = DB::connection('nhc_data')
				->table($tb_name)
				->where('agency_id','=',$results->agency_code)
				->where(DB::raw($datefield.'::date'),'=',$date)
				->where(DB::raw($datefield.'::date'),'<=',$result_query->period)
				->orderBy($field,'DESC')
				->select('*')
				->take(100)
				->get();
				//->get();
		}
		return $nhc_data;
	}
}
