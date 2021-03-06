<?php

class HelpController extends BaseController {

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
	public function helpDocument()
	{
        return View::make('help.help');
	}

	public function functionalDocument()
	{
        return View::make('help.functional');
	}

    public function glossary()
    {
        return View::make('help.glossary');
    }

}