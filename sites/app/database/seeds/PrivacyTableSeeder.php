<?php

class PrivacyTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('privacy')->truncate();
		$now = date('Y-m-d H:i:s');
		$privacy = array(
			array(
				'userid'=>1,
				'fname'=>true,
				'lname'=>false,
				'email'=>false,
				'telno'=>false,
				'agency'=>false,
				'department'=>false,
				'ministry'=>false,
				'role'=>false,
				'action'=>false,
				'created_at'=>$now,
				'updated_at'=>$now,
				),
			array(
				'userid'=>2,
				'fname'=>true,
				'lname'=>false,
				'email'=>false,
				'telno'=>false,
				'agency'=>false,
				'department'=>false,
				'ministry'=>false,
				'role'=>false,
				'action'=>false,
				'created_at'=>$now,
				'updated_at'=>$now,
				),
			array(
				'userid'=>3,
				'fname'=>true,
				'lname'=>false,
				'email'=>false,
				'telno'=>false,
				'agency'=>false,
				'department'=>false,
				'ministry'=>false,
				'role'=>false,
				'action'=>false,
				'created_at'=>$now,
				'updated_at'=>$now,
				),
		);

		// Uncomment the below to run the seeder
		DB::table('privacy')->insert($privacy);
	}

}
