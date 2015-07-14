<?php

class PbdiaController extends BaseController {

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

	/**
	 * [pbdiaPolicy description]
	 * @param  [type] $pbdid [description]
	 * @return [type]        [description]
	 */
	public function pbdiaPolicy($pbdid)
	{
		return View::make('pbdia.pbdiapolicy')->with('policy_id',$pbdid);
	}

	/**
	 * [pbdiaAll description]
	 * @return [type] [description]
	 */
	public function pbdiaAll()
	{
		return View::make('pbdia.pbdia');	
	}
}