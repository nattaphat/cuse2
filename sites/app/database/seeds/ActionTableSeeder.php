<?php

class ActionTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('action')->truncate();
		$now = date('Y-m-d H:i:s');
		$action = array(
				array(
					'action_name'=> 'ดาวน์โหลด',
					'action'=>'download',
					'created_at' => $now,
					'updated_at' => $now,
					),
				array(
					'action_name'=> 'แจ้งกลับไปยังเจ้าหน้าที่คลังข้อมูล',
					'action'=>'inform',
					'created_at' => $now,
					'updated_at' => $now,
					),
				array(
					'action_name'=> 'เรียกดูขอ้มูล',
					'action'=>'readonly',
					'created_at' => $now,
					'updated_at' => $now,
					),
				array(
					'action_name'=> 'ขออนุญาตเปิดเผยข้อมูล',
					'action'=>'disclose',
					'created_at' => $now,
					'updated_at' => $now,
					),
				array(
					'action_name'=> 'ขออนุญาตส่งต่อข้อมูล',
					'action'=>'transfer',
					'created_at' => $now,
					'updated_at' => $now,
					),
				array(
					'action_name'=> 'เพิ่มข้อมูลหรือแก้ไข',
					'action'=>'insertupdate',
					'created_at' => $now,
					'updated_at' => $now,
					),
				array(
					'action_name'=> 'ลบข้อมูล',
					'action'=>'remove',
					'created_at' => $now,
					'updated_at' => $now,
					),
		);

		// Uncomment the below to run the seeder
		DB::table('action')->insert($action);
	}

}
