<?php

class ObligationTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('obligation')->truncate();
		$now = date('Y-m-d H:i:s');
		$obligation = array(
			array(
				'obl_name'=>'เข้าสู่ระบบก่อน',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'obl_name'=>'บันทึกประวัติการใช้งานก่อนออกจากระบบ',
				'created_at' => $now,
				'updated_at' => $now,
				),
		);

		// Uncomment the below to run the seeder
		DB::table('obligation')->insert($obligation);
	}

}
