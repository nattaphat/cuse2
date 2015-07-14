<?php

class SrctableTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('srctable')->truncate();
		 $now = date('Y-m-d H:i:s');
		$srctable = array(
			array(
					'src_name'=>'v_sum_rainfall',
					'comment'=> 'ข้อมูลฝนทั้งหมด',
					'created_at'=>$now,
					'updated_at'=>$now
				),
			array(
					'src_name'=>'v_dam_daily',
					'comment'=> 'ข้อมูลน้ำในเขื่อน',
					'created_at'=>$now,
					'updated_at'=>$now
				),
			array(
					'src_name'=>'v_tele_met',
					'comment'=>'ข้อมูลจากโทรมาตรทุกพารามิเตอร์',
					'created_at'=>$now,
					'updated_at'=>$now
				),
			array(
					'src_name'=>'v_tele_water_level_168h',
					'comment'=>'ข้อมูลระดับน้ำ',
					'created_at'=>$now,
					'updated_at'=>$now
				),
			array(
					'src_name'=>'v_rainfall168h_lasted',
					'comment'=>'ข้อมูลปริมาณฝนย้อนหลัง 3 วัน 7 วัน',
					'created_at'=>$now,
					'updated_at'=>$now
				),
		);

		// Uncomment the below to run the seeder
		 DB::table('srctable')->insert($srctable);
	}

}
