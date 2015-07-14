<?php

class Policy extends Eloquent {
	protected $guarded = array();

	protected $table = 'v_policy';
	//protected $table = 'v_policy';
	public static $rules = array();
	//protected $connection = 'nhc_data';
	//$users = DB::connection('nhc_data')->select(...);
	
	/**
	 * [getAllPolicy fetch all policy]
	 * @param  [integer] $perPage [limit result per page]
	 * @return [array]          [collect of policy]
	 */
	public function getAllPolicy($perPage)
	{
		// $items =  Policy::all()->toArray();
		// $policy = Policy::paginate();
		// $totalItems = $policy->getTotal();
		// $paginator = Paginator::make($items, $totalItems, $perPage);
		// return $paginator;
		//return Policy::paginate($per_page);
		
		$policy = Policy::whereNotNull('id')
						->orderBy('id', 'asc')->paginate($perPage);

		return $policy;
	}

	public function getAllPolicyVersion2()
	{
		// $items =  Policy::all()->toArray();
		// $policy = Policy::paginate();
		// $totalItems = $policy->getTotal();
		// $paginator = Paginator::make($items, $totalItems, $perPage);
		// return $paginator;
		//return Policy::paginate($per_page);
		
		$policy = Policy::whereNotNull('id')
						->orderBy('id', 'asc')->get();

		return $policy;
	}

	/**
	 * [getPolicyById fetch policy by policy id]
	 * @param  [integer] $id [policy id]
	 * @return [array]     [collect of policy]
	 */
	public function getPolicyById($id)
	{
		// $policy = Policy::where('id','=',$id)
		// 				->toSql();
		$policy = Policy::find($id);
		return $policy;
	}

	/**
	 * [getPolicyByKeywork fetch array by key work or searching]
	 * @param  [string] $keywork [key word for search policy]
	 * @param  [integer] $perPage [limit result per page]
	 * @return [array]          [collect of policy]
	 */
	public function getPolicyByKeywork($keywork,$perPage)
	{
		if($keywork != 'all'){
			$policy = Policy::whereRaw('policy_content like ? or author like ?',array('%'.$keywork.'%','%'.$keywork.'%'))
						->orderBy('id', 'asc')
						->paginate($perPage);
		}
		else{
			$policy = Policy::where('policy_content','!=','')->orderBy('id', 'asc')->paginate($perPage);
		}		
						
		return $policy;
	}

	/**
	 * [getPolicyByUserId get policy by relete with user id]
	 * @return [array]     [collect of policy]
	 */
	public static function getPolicyByUserId()
	{
		$role_id = Usernhc::getRoleName()->role_id;

		$rs = DB::table('role_policy')
			->join('policy','role_policy.policy_id','=','policy.id')
			->where('role_policy.role_id','=',$role_id)
			//->where('policy.status','=',true)
			->orderBy('policy.id', 'asc')
			->select(
				'policy.id',
				'policy.policy_content',
				'policy.author',
				'policy.status',
				'policy.policy_duty'
				)
			->distinct()
		 	->get();
		 //var_dump($rs);exit;
		 return $rs;
	}

	public function ckeckPolicyDuplicate($strlen_policy)
	{
		$pol = Policy::select(DB::raw(' count(*)'))
						->where(DB::raw("length(policy_content)"),'=',$strlen_policy)
						->get();
		$rs = $pol[0]['count'];
		if(isset($rs))
		{
			return ($rs >= 1) ? false : true;
		}
	}
}
