<?php

class PurposeTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('purpose')->truncate();
		$now = date('Y-m-d H:i:s');

		$purpose = array(
			array(
				'purp_name' => 'เพื่องานวิจัย',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'purp_name' => 'เพื่อการพัฒนาระบบ',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'purp_name' => 'เพื่อใช้ในหน่วยงานเท่านั้น',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'purp_name' => 'เพื่อการบริหารและดูแลคลังข้อมูลเท่านั้น',
				'created_at' => $now,
				'updated_at' => $now,
				),
		);

		// Uncomment the below to run the seeder
		DB::table('purpose')->insert($purpose);
	}

}
