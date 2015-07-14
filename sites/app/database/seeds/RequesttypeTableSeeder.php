<?php

class RequesttypeTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('request_type_data')->truncate();
		$now = date('Y-m-d H:i:s');
		$requesttype = array(
			array(
				'type_name'=>'ขออนุญาตเปิดเผยข้อมูล',
				'created_at'=>$now,
				'updated_at'=>$now
				),
			array(
				'type_name'=>'ขออนุญาตส่งต่อข้อมูล',
				'created_at'=>$now,
				'updated_at'=>$now
				)
		);

		// Uncomment the below to run the seeder
		DB::table('request_type_data')->insert($requesttype);
	}

}
