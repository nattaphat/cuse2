<?php

class RoleTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('role')->truncate();
		 $now = date('Y-m-d H:i:s');

		$role = array(
			array(
				'role_name'=>'นักวิจัย',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'role_name'=>'นักพัฒนาระบบ',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'role_name'=>'ผู้ดูแลฐานข้อมูล',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'role_name'=>'เจ้าหน้าที่ประจำหน่วยงาน',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'role_name'=>'เจ้าหน้าที่คลังข้อมูล',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'role_name'=>'บุคคลทั่วไป',
				'created_at' => $now,
				'updated_at' => $now,
				),
		);

		// Uncomment the below to run the seeder
		 DB::table('role')->insert($role);
	}

}
