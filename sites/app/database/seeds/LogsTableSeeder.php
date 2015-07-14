<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LogsTableSeeder extends Seeder {

	

	public function run()
	{
		$faker = Faker::create();
		Logs::truncate();

		foreach(range(1, 500) as $index)
		{
			Logs::create([
				"ip"=>$faker->localIpv4,
				"host"=>$faker->domainName,
				"lastpage"=>"",
				"last_visit"=>$faker->dateTimeBetween($startDate = '-120 days', $endDate = 'now'),
				"created_at"=>$faker->date($format = 'Y-m-d', $max = 'now').' '.$faker->time($format = 'H:i:s', $max = 'now') ,
				"updated_at"=>$faker->date($format = 'Y-m-d', $max = 'now').' '.$faker->time($format = 'H:i:s', $max = 'now') ,
				"role_id"=>$faker->numberBetween($min = 1, $max = 6),
				"data_id"=>$faker->numberBetween($min = 1, $max = 11)
			]);
		}
	}

}