<?php

class Training extends Eloquent {
	protected $guarded = array();
	protected $table = 'training';
	public static $rules = array();
	
	/**
	 * [getAllTraining description]
	 * @param  [type] $paging [description]
	 * @return [type]         [description]
	 */
	public function getAllTraining($paging)
	{
		return Training::where('title','!=','')
						->orderBy('id', 'asc')->paginate($paging);
	}

	/**
	 * [numTrainCourse description]
	 * @return [type] [description]
	 */
	public static function numTrainCourse(){

		$userid = Auth::getUser()->id;
		$roleid = RoleUser::where('user_id',$userid)->get(array('role_id'));

		$numCourse = Training::where('target','LIKE','%'.$roleid[0]->role_id.'%')
							//->join('user_training', 'user_training.training_id', '=', 'training.id')
							//->where('attend','!=',true)
							->where('status','!=',false)
							->count();
		// echo $numCourse;exit;
		return $numCourse;
	}

	/**
	 * [getTrainByKeywork description]
	 * @param  [type] $keyword [description]
	 * @param  [type] $page    [description]
	 * @return [type]          [description]
	 */
	public function getTrainByKeywork($keyword,$page)
	{
		if($keyword != 'all'){
			$training = Training::whereRaw('title like ? or description like ?',
								array('%'.$keyword.'%','%'.$keyword.'%'))
						->orderBy('id', 'asc')
						->paginate($page);
		}
		else{
			$training = $this->getAllTraining($page);
		}		
						
		return $training;
	}

	public function checkTitle($title)
	{
		$rs = Training::where('title','=',$title)->count();
		
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}

	/**
	 * [getReport description]
	 * @param  [type] $trainid [description]
	 * @return [type]          [description]
	 */
	public function getReport($trainid,$perPage)
	{
		$rs = DB::table('user_training')
				->join('training', 'user_training.training_id', '=', 'training.id')
				->join('usernhc', 'user_training.userid', '=', 'usernhc.id')
				->join('role_user', 'role_user.user_id', '=', 'usernhc.id')
				->join('roles', 'role_user.role_id', '=', 'roles.id')
				->join('agency', 'usernhc.agency_id', '=', 'agency.id')
				->where('training.id','=',$trainid)
				->select('training_id','title','fname','lname','tname','role_name')
				->paginate($perPage);

		return $rs;
	}

    public function getLatestId()
    {

    }
}
