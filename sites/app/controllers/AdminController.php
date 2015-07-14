<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		if(Auth::getUser()->grp_id == 1) {
			//return View::make('layouts.admin');
			return Redirect::to('policy-content');
		}
		else {
			$policy = new Policy();
			$per_page = Config::get('nhc/site.policy_perpage') ;
			$user_policy = Policy::getPolicyByUserId();
			
			$all_policy = $policy->getAllPolicy($per_page);
			return View::make('welcome')	
					->with('relate_policy',$user_policy)
					->with('paginator',$all_policy);
		}
	}

}