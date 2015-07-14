<?php

class UserTraining extends Eloquent {
	protected $guarded = array();
	public $timestamps = false;
	protected $table = 'user_training';

	public static $rules = array();
	
	/**
	 * [checkAttend description]
	 * @param  [type] $userid   [description]
	 * @param  [type] $courseid [description]
	 * @return [type]           [description]
	 */
	public static function checkAttend($userid,$courseid)
	{
		$rs = UserTraining::where('user_training.userid','=',$userid)
							->join('training','training.id', '=', 'user_training.training_id')
							->where('user_training.training_id','=',$courseid)
							->where('user_training.attend','=',false)
							->where('training.status','!=',false)
							->count();
		return $rs;
	}

	/**
	 * [checkEditAttend description]
	 * @param  [type] $userid   [description]
	 * @param  [type] $courseid [description]
	 * @return [type]           [description]
	 */
	public static function checkEditAttend($userid,$courseid)
	{
		$rs = UserTraining::where('userid','=',$userid)
							->where('training_id','=',$courseid)
							->count();
		return $rs;
	}

	/**
	 * [getTrainIdByUserid description]
	 * @param  [type] $userid   [description]
	 * @param  [type] $courseid [description]
	 * @return [type]           [description]
	 */
	public function getTrainIdByUserid($userid,$courseid)
	{
		$rs = UserTraining::where('userid','=',$userid)
							->where('training_id','=',$courseid)
							->get();
		return $rs;
	}

	/**
	 * [getUserTrainByUserId description]
	 * @param  [type] $userid [description]
	 * @return [type]         [description]
	 */
	public function getUserTrainByUserId($userid)
	{
		$rs = DB::table('v_training')
							->where('userid','=',$userid)
							->orderBy('start_training_date','DESC')
							->get();
		return $rs;
	}

	/**
	 * [getUserTrainByRoleId description]
	 * @param  [type] $roleid [description]
	 * @return [type]         [description]
	 */
	public function getUserTrainByRoleId($roleid)
	{
		$rs = DB::table('v_training')
							->where('target','like','%'.$roleid.'%')
							->orderBy('start_training_date','DESC')
							->distinct()
							->get();
		return $rs;
	}

	/**
	 * [getUserTrainByDate description]
	 * @param  [type] $dt_start [description]
	 * @param  [type] $dt_end   [description]
	 * @return [type]           [description]
	 */
	public function getUserTrainByDate($dt_start,$dt_end)
	{
// 		echo $dt_start;
// 		echo $dt_end;

// 		select * from v_training 
// where  
// start_training_date >= '2014-07-13 09:35:00'::date
// and 
// '2014-12-24 09:35:00'::date <= closed_date
// order by start_training_date desc

		$rs = DB::table('v_training')
							->where(DB::raw('start_training_date::text'),'>=',$dt_start)
							->where(DB::raw('closed_date::text'),'<=',$dt_end)
							->orderBy('start_training_date','DESC')
							->get();
		// var_dump($rs);exit;
		return $rs;
	}

	public function getUserTrainByCourseName($keyword)
	{
		$rs = DB::table('v_training')
							->where('title','like','%'.$keyword.'%')
							->orderBy('start_training_date','DESC')
							->get();
		return $rs;	
	}
}
