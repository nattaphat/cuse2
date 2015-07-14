<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PrivacyInitTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		PrivacyInit::truncate();
		$now = date('Y-m-d H:i:s');

		$raw = array(
					array(
						"name_en"=>'fname',
						"name_th"=>'ชื่อผู้ใช้งาน',
						"privacy_type"=>'1',
						"removeable"=>false,
						"init_value"=>true,
						"created_at"=>$now,
						"updated_at"=>$now,
						),
					array(
						"name_en"=>'lname',
						"name_th"=>'นามสกุล',
						"privacy_type"=>'1',
						"removeable"=>false,
						"init_value"=>false,
						"created_at"=>$now,
						"updated_at"=>$now,
						),
					array(
						"name_en"=>'role',
						"name_th"=>'บทบาท',
						"privacy_type"=>'1',
						"removeable"=>false,
						"init_value"=>false,
						"created_at"=>$now,
						"updated_at"=>$now,
						),
					array(
						"name_en"=>'email',
						"name_th"=>'อีเมล์',
						"privacy_type"=>'1',
						"removeable"=>false,
						"init_value"=>false,
						"created_at"=>$now,
						"updated_at"=>$now,
						),
					array(
						"name_en"=>'telno',
						"name_th"=>'เบอร์ติดต่อ',
						"privacy_type"=>'1',
						"removeable"=>false,
						"init_value"=>false,
						"created_at"=>$now,
						"updated_at"=>$now,
						),
					array(
						"name_en"=>'agency',
						"name_th"=>'หน่วยงานสังกัด',
						"privacy_type"=>'1',
						"removeable"=>false,
						"init_value"=>false,
						"created_at"=>$now,
						"updated_at"=>$now,
						),
					array(
						"name_en"=>'department',
						"name_th"=>'ทบวงกรม',
						"privacy_type"=>'1',
						"removeable"=>false,
						"init_value"=>false,
						"created_at"=>$now,
						"updated_at"=>$now,
						),
					array(
						"name_en"=>'ministry',
						"name_th"=>'กระทรวง',
						"privacy_type"=>'1',
						"removeable"=>false,
						"init_value"=>false,
						"created_at"=>$now,
						"updated_at"=>$now,
						)
				);

		foreach(range(0, 7) as $index)
		{
			PrivacyInit::create([
				"name_en"=>$raw[$index]['name_en'],
				"name_th"=>$raw[$index]['name_th'],
				"privacy_type"=>$raw[$index]['privacy_type'],
				"init_value"=>$raw[$index]['init_value'],
				"removeable"=>$raw[$index]['removeable'],
				"created_at"=>$raw[$index]['created_at'],
				"updated_at"=>$raw[$index]['updated_at'],
			]);
		}
	}

}