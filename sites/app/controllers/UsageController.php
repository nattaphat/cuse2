<?php

//use Faker\Factory as Faker;
class UsageController extends BaseController {

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
	public $logObj;

	public function __construct()
	{	
		$this->logObj = new Logs();
	}

	public function randomColor()
	{
		$color = array("#C0C0C0",
						"#0000FF",
						"#808080",
						"#0000A0",
						"#ADD8E6",
						"#FFA500",
						"#800080",
						"#A52A2A",
						"#FFFF00",
						"#800000",
						"#00FF00",
						"#008000",
						"#FF00FF",
						'#808000');
		// $faker = Faker::create();
		// return $faker->randomElement($array = $color);
		return array_rand($color);
	}
	public function usageAction()
	{
		$roleObj =  Roles::all();
		$dataObj =  Data::all();

        return View::make('usage.usage');
	}

	public function usageRoleChart()
	{
		$rs = $this->logObj->getRoleStat();
		$sum = 0;
		foreach ($rs as $key => $value) {
			$sum = $sum + $value['count'];
		}

		foreach ($rs as $key => $value) {
			$stat[$value->role_id] = $value;
			$percent = $value['count'] * 100 / $sum;
			$stat[$value->role_id]['percent'] = $percent;
			$stat[$value->role_id]['color'] = '#'.substr(md5(rand()), 0, 6);//$this->randomColor();
		}
		return View::make('usage.chart_role')->with('role_stat',$stat);
	}

	public function usageDataChart()
	{
		$rs = $this->logObj->getDataStat();
		$sum = 0;
		foreach ($rs as $key => $value) {
			$sum = $sum + $value['count'];
		}

		foreach ($rs as $key => $value) {
			$stat[$value->data_id] = $value;
			$percent = $value['count'] * 100 / $sum;
			$stat[$value->data_id]['percent'] = $percent;
			$stat[$value->data_id]['color'] = '#'.substr(md5(rand()), 0, 6);//$this->randomColor();
		}
		return View::make('usage.chart_data')->with('data_stat',$stat);
	}

}