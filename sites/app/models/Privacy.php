<?php

class Privacy extends Eloquent {
	protected $guarded = array();

	protected $table = 'privacy';

	public static $rules = array();

	public function getUserPrivacy($id)
	{	
		$u_privacy = Privacy::where('userid','=',$id)->get();
		
		//var_dump($u_privacy);exit;
		if(isset($u_privacy)){ 
			return $u_privacy;
		}
		else {
			return null;
		}
	}

}
