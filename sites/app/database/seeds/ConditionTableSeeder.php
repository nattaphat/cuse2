<?php

class ConditionTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('condition')->truncate();
		$now = date('Y-m-d H:i:s');
		$condition = array(
			array(
				'cond_name'=>'ข้อมูลปัจจุบัน',
				'condition' => 'now()::date - 0',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'cond_name'=>'ข้อมูลย้อนหลัง 3 วัน',
				'condition' => 'now()::date - 3',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'cond_name'=>'ข้อมูลย้อนหลัง 7 วัน',
				'condition' => 'now()::date - 7',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'cond_name'=>'ได้รับการยินยอมจากเจ้าหน้าที่คลังข้อมูล',
				'condition' => '',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'cond_name'=>'ได้รับการยินยอมจากหน่วยงานเจ้าของข้อมูล',
				'condition' => '',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'cond_name'=>'ข้อมูลไม่ถูกต้อง',
				'condition' => '',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'cond_name'=>'ข้อมูลปัจจุบัน 100 เรคคอร์ด',
				'condition' => ' limit 100 offset 0',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'cond_name'=>'ข้อมูลปัจจุบัน 200 เรคคอร์ด',
				'condition' => ' limit 200 offset 0',
				'created_at' => $now,
				'updated_at' => $now,
				),
			array(
				'cond_name'=>'ข้อมูลปัจจุบัน 20 อันดับสูงสุด',
				'condition' => ' limit 20 offset 0',
				'created_at' => $now,
				'updated_at' => $now,
				)
		);

		// Uncomment the below to run the seeder
		DB::table('condition')->insert($condition);
	}

}
