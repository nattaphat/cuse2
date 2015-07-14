<?php

class MinistryTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		//DB::table('ministry')->truncate();
		DB::table('ministry2');
		$now = date('Y-m-d H:i:s');
		$ministry = array(
				array(
					'full_name'=>'รัฐวิสาหกิจ',
					'short_name'=>'',
					'ministry_id'=>26,
					'code'=>'50000',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'full_name'=>'กระทรวงคมนาคม',
					'short_name'=>'คค.',
					'ministry_id'=>16,
					'code'=>'08000',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'full_name'=>'กระทรวงเทคโนโลยีสารสนเทศและการสื่อสาร',
					'short_name'=>'ทก.',
					'ministry_id'=>14,
					'code'=>'11000',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'full_name'=>'กระทรวงวิทยาศาสตร์และเทคโนโลยี',
					'short_name'=>'วท.',
					'ministry_id'=>6,
					'code'=>'19000',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'full_name'=>'กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม',
					'short_name'=>'ทส.',
					'ministry_id'=>15,
					'code'=>'09000',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'full_name'=>'กระทรวงเกษตรและสหกรณ์',
					'short_name'=>'กษ.',
					'ministry_id'=>17,
					'code'=>'07000',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'full_name'=>'กระทรวงกลาโหม',
					'short_name'=>'กห.',
					'ministry_id'=>20,
					'code'=>'50000',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'full_name'=>'กระทรวงมหาดไทย',
					'short_name'=>'มท.',
					'ministry_id'=>10,
					'code'=>'50000',
					'created_at'=>$now,
					'updated_at'=>$now
					),
		);

		// Uncomment the below to run the seeder
		DB::table('ministry2')->insert($ministry);
	}

}
