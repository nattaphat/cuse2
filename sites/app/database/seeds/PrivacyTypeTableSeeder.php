<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PrivacyTypeTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		PrivacyType::truncate();
		$now = date('Y-m-d H:i:s');
		$raw = array(
					array(
						"name"=>'user',
						"created_at"=>$now,
						"updated_at"=>$now,
						),
					array(
						"name"=>'data',
						"created_at"=>$now,
						"updated_at"=>$now,
						)
				);

		foreach(range(0, 1) as $index)
		{
			PrivacyType::create([
						"name"=>$raw[$index]['name'],
						"created_at"=>$raw[$index]['created_at'],
						"updated_at"=>$raw[$index]['updated_at'],
			]);
		}
	}

}