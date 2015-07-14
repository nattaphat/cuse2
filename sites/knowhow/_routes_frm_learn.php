<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::filter('birthday', 'BirthdayFilters');

// Route::filter('birthday', function()
// {
// 	//if (date('d/m/y') == '09/09/13') {
// 	if (true) {
// 		return View::make('birthday');
// 	}
// });

Route::get('/', array(
	/*
	after:
	You need to remember, however, that the after filter cannot replace the response. Thus, our birthday
	filter is a little pointless when using ‘after’. You could however perform some logging, or a cleanup
	operation. Just remember that it’s there if you need it!
	 */
	'before' => 'birthday:09/09',
	//'after' => 'birthday',
	function()
	{
		return View::make('hello');
	}
));

Route::get('index','ArticleController@showIndex');

Route::post('article/new','ArticleController@newArticle');

Route::post('index','Blog\Controller\Article@showIndex');

// This single method will route all ot the actioins representd by our RESTful controller
Route::controller('article','Blog\Controller\Article');

//Advance Route
Route::get('/my/long/calendar/route', array(
	'as' => 'calendar',
	function() {
		return View::make('calendar');
	}
));

Route::get('/my/long/calendar/route', array(
	'as' => 'calendar',
	'uses' => 'CalendarController@showCalendar'
));
// for blade.php
// {{ route('calendar') }}
//return new Redirect::route('calendar');

//Secure Routes
Route::get('secret/content', array(
	'https',
	function () {
		return 'Secret squirrel!';
	}
));

//Parameter Constraints - make sure that it consists of letters only
Route::get('save/{princess}', function($princess)
{
	return "Sorry, {$princess} is in another castle. :(";
})->where('princess', '[A-Za-z]+');

Route::get('save/{princess}/{unicorn}', function($princess, $unicorn)
{
	return "{$princess} loves {$unicorn}";
})->where('princess', '[A-Za-z]+')
  ->where('unicorn', '[0-9]+');

//Route Groups  
Route::group(array('prefix' => 'books'), function()
{

	// First Route
	Route::get('/first', function() {
		return 'The Colour of Magic';
	});

	// Second Route
	Route::get('/second', function() {
		return 'Reaper Man';
	});

	// Third Route
	Route::get('/third', function() {
		return 'Lords and Ladies';
	});

});

// The current URL
Route::get('/current/url', function()
{
	return URL::current(); //without parameter
	return URL::full(); //include parameter

});

Route::get('first', function()
{
	// Redirect to the second route.
	return Redirect::to('second');
});

Route::get('second', function()
{
	return URL::previous();
});

//Generating Framework URLs
Route::get('example', function()
{
	return URL::to('another/route');
	//The response we receive when we visit /example looks like this.
	// http://demo.dev/another/route
});

Route::get('example', function()
{
	return URL::to('another/route', array('foo', 'bar'));
	// http://myapp.dev/another/route/foo/bar
	// for HTTPS add 'true' at the third param
	// URL::to('another/route', array('foo', 'bar'), true);
});

// Our Controller.
class Stark extends BaseController
{
	public function tony()
	{
		return 'You can count on me, to pleasure myself.';
	}
}

// Route to the Stark controller.
Route::get('i/am/iron/man', 'Stark@tony');

Route::get('example', function()
{
	return URL::action('Stark@tony');//get by action
});

// Route to the Stark controller.
Route::get('tony/the/{first}/genius', 'Stark@tony');

Route::get('example', function()
{
	return URL::action('Stark@tony', array('narcissist'));
});

//Asset URL
Route::get('example', function()
{
	return URL::asset('img/logo.png');
});

//Asste URL for HTTPS
Route::get('example', function()
{
	return URL::asset('img/logo.png',true);
});

// OR

Route::get('example', function()
{
	return URL::secureAsset('img/logo.png');
});

//Get Req data
Route::get('/', function()
{
	$data = Input::all();// $_GET[]
	//$data = Input::get('foo'); //get only 'foo'
	//$result = Input::has('foo'); // has 'foo' ?
	//$result = Input::only('foo', 'baz'); //get array index name 'foo' adn 'baz'
	//$result = Input::except('foo', 'baz'); // OR
	//$result = Input::except(array('foo', 'baz'));
	var_dump($data);
});
// Old Input
Route::get('/', function()
{
	//http://myapp.dev/?foo=one&bar=two
	Input::flashOnly('foo');
	Input::flashExcept('foo');
	Input::flash();//Using the Input::flash() method, we can tell Laravel to hold on to the request
					//data for an additional request.
	return Redirect::to('new/request');
});

Route::get('new/request', function()
{
	//array(0) { }
	var_dump(Input::all());

	//array(2) { ["foo"]=> string(3) "one" ["bar"]=> string(3) "two" }
	var_dump(Input::old());
});

//If you chain the withInput() method onto the redirect, 
//Laravel will flash all of the current request data to the next request for you
Route::get('/', function()
{
	return Redirect::to('new/request')->withInput();
});

Route::get('/', function()
{
	return Redirect::to('new/request')->withInput(Input::except('foo'));
	return Redirect::to('new/request')->withInput(Input::only('foo'));
});

//Uploaded Files
Route::get('/', function()
{
	return View::make('form');
});

Route::post('handle-form', function()
{
	var_dump(Input::file('book'));
	return Input::file('book')->getFileName(); //phpaL1eZS
	return Input::file('book')->getClientOriginalName(); // codebright.pdf
	return Input::file('book')->getClientSize(); //2370413
	return Input::file('book')->getMimeType(); //application/pdf
	return Input::file('book')->guessExtension(); //pdf
	return Input::file('book')->getRealPath();// /tmp/php/phpLfBUaq

	Input::file('book')->move('/storage/directory'); // copy(), rename()
	return 'File was moved.';

	$name = Input::file('book')->getClientOriginalName();
	Input::file('book')->move('/storage/directory', $name);
	return 'File was moved.';
});

//Cookies - Setting and Getting Cookies
Route::get('/', function()
{
	$cookie = Cookie::make('low-carb', 'almond cookie', 30); //method to create a new cookie
	//first parameter of the method is a key
	//second parameter is the value
	//The third and final parameter lets Laravel know how long to store the cookie for, in minutes
});

Route::get('/', function()
{
	$cookie = Cookie::make('low-carb', 'almond cookie', 30);
	return Response::make('Nom nom.')->withCookie($cookie); 
	//The withCookie() method can be used to attach a cookie to a response object
	
	// forever() method have no expiry date
	$cookie = Cookie::forever('low-carb', 'almond cookie');

	//If we want to delete a cookie we can use the Cookie::forget() method.
	Cookie::forget('low-carb');
});

Route::get('/nom-nom', function()
{
	$cookie = Cookie::get('low-carb');
	// get some chicken if there are no low carb cookies available.
	$cookie = Cookie::get('low-carb', 'chicken');
	var_dump($cookie);

	//Cookie::has() method to check to see if a cookie is set
	var_dump(Cookie::has('low-carb'));
});

//Schema create
Route::get('/create', function()
{
	//first parameter is table name
	//second parameter is closure
	Schema::create('users', function($table)
	{
		$table->increments('id');
		$table->string('username', 32);
		$table->string('email', 320);
		$table->string('password', 60);
		$table->timestamps(); //Special Column Types
		//$table->text('body');
		//$table->integer('shoe_size');
		//$table->smallInteger('size');
		//$table->float('size');
		//$table->decimal('size');
		//$table->boolean('hot');
		//$allow = array('Walt', 'Jesse', 'Saul');
		//$table->enum('who', $allow);
		//$table->date('when');
		//$table->dateTime('when');
		//$table->time('when');
		//$table->timestamp('when');
		//$table->binary('image');
		//
		//Special Column Types
		//$table->softDeletes(); // mark table row as deleted, without actually deleting the data contained within
		//
		//Column Modifiers
		//$table->string('username')->unique()->primary();
		//$table->integer('id');
		//
		// $table->string('username');
		// $table->string('email');
		// $keys = array('id', 'username', 'email');
		// $table->primary($keys);
		// 
		// $table->integer('age')->index();
		// 
		// $table->integer('age');
		// $table->integer('weight');
		// $table->index(array('age', 'weight'));
		// 
		// $table->string('name')->nullable();
		// 
		// $table->string('name')->default('John Doe');
		// 
		// Rename the users table to idiots.
		//Schema::rename('users', 'idiots');
		//
		//If we want to alter the columns of an existing table, we need to use the Schema::table() method
		// Schema::create('example', function($table)
		// {
		// 	$table->increments('id');
		// });

		// Schema::table('example', function($table)
		// {
		// 	$table->string('name');
		// });
		// 
		//Drop column
		// Schema::create('example', function($table)
		// {
		// 	$table->increments('id');
		// 	$table->string('name');
		// });

		// Schema::table('example', function($table)
		// {
		// 	$table->dropColumn('name', 'age');
		// });
		// 
		//Rename colunn
		//$table->renameColumn('name', 'nickname');
		//
		//Drop primary
		//$table->dropPrimary('name');
		//$table->dropPrimary(array('name', 'email'));
		//
		//Drop unique 
		//This method accepts a single parameter, 
		//which consists of the table name, column name, and ‘unique’ separated by underscores
		//Ex.
		// Schema::create('example', function($table)
		// {
		// $table->string('name')->unique();
		// });

		// Schema::table('example', function($table)
		// {
		// $table->dropUnique('example_name_unique');
		// $columns = array('example_name_unique', 'example_email_unique');
		// $table->dropUnique($columns);
		// $table->dropIndex('example_name_index'); // param sam uniuqe
		// });
		// 
		// Drop table
		// Schema::drop('example');
		// Schema::dropIfExists('example');


	});

//custom validation
Validator::extend('awesome', 'CustomValidation@awesome');

Route::post('/registration', function()
{
	$data = Input::all();

	// 'min:3' ensures that the value is greater than or equal to the parameter provided
	// 'max:32' ensure that the value is less than or equql to the parameter provided
	$rules = array(
		//'username'=> 'awesome',
		'username' => array('alpha_num', 'min:3','max:32','required'), 
		'email' => array('required','email'),
		'password' => array('required','min:4','same:password_confirmation'),
		'password_confirmation' => array('required'),
	);

	// Build the custom messages array.
	$messages = array(
		'username.min' => 'Hmm, that looks a little small.'
	);

	// Create a new validator instance.
	$validator = Validator::make($data, $rules,$messages);

	// if ($validator->fails()) {
	// 	return Redirect::to('/');
	// }

	if ($validator->passes()) {
		// Normally we would do something with the data.
		return 'Data was saved.';
	}else{
		//$errors = $validator->messages();
		return Redirect::to('/')->withErrors($validator);
	}
});
