<?php

class RoleUserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('role_user')->truncate();

		//For superadmin prevent account and secrity page error
		$role_user = array(
				array(
					'role_id'=>1,
					'user_id'=>1
					)
		);

		// Uncomment the below to run the seeder
		DB::table('role_user')->insert($role_user);
	}

}
