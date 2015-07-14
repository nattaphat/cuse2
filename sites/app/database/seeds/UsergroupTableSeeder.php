<?php

class UsergroupTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('usergroup')->truncate();
		$now = date('Y-m-d H:i:s');
		$usergroup = array(
					array(
						'grp_name'=>'SUPER ADMIN',
						'grp_nameth'=>'superadmin',
						'grp_description'=>'super admin can do everything',
						'created_at'=>$now,
						'updated_at'=>$now
						),
					array(
						'grp_name'=>'ADMIN',
						'grp_nameth'=>'ผู้ดูแลระบบ ของหน่วยงาน',
						'grp_description'=>'admin can do by super admin assig',
						'created_at'=>$now,
						'updated_at'=>$now
						),
					array(
						'grp_name'=>'USER',
						'grp_nameth'=>'ผู้ใช้งานทั่วไป ของหน่วยงาน',
						'grp_description'=>'user use the basic right',
						'created_at'=>$now,
						'updated_at'=>$now
						),
		);

		// Uncomment the below to run the seeder
		DB::table('usergroup')->insert($usergroup);
	}

}
