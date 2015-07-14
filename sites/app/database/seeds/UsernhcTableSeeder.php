<?php

class UsernhcTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('usernhc')->truncate();
		$now = date('Y-m-d H:i:s');
		$usernhc = array(
				array(
					'agency_id' => 1,
					'grp_id' => 1,
					'username' => 'superadmin',
					'password' => Hash::make('superadmin'),
					'email' => 'yotsapon@haii.or.th',
					'fname' => 'Super Admin',
					'lname' => 'Super',
					'telno' => '02-6427132',
					'status' => 'yes',
					'created_at' => $now,
					'updated_at' => $now,
					'rememberme'=>true
				),array(
					'agency_id' => 4, //Haii
					'grp_id' => 3, //User
					'username' => 'nattaphat',
					'password' => Hash::make('123456'),
					'email' => 'nattaphat@gmail.com',
					'fname' => 'Nattaphat',
					'lname' => 'Khamnon',
					'telno' => '02-6427132',
					'status' => 'no',
					'created_at' => $now,
					'updated_at' => $now	,
					'rememberme'=>true
				),array(
					'agency_id' => 3, //Egat
					'grp_id' => 3, //User
					'username' => 'yotsapon',
					'password' => Hash::make('123456'),
					'email' => 'nattaphat@haii.or.th',
					'fname' => 'Yotsapon',
					'lname' => 'Lertladechanon',
					'telno' => '02-6427132',
					'status' => 'no',
					'created_at' => $now,
					'updated_at' => $now,
					'rememberme'=>true
				)
				);

		// Uncomment the below to run the seeder
		DB::table('usernhc')->insert($usernhc);
	}

}
