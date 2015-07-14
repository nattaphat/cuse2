<?php

class AgencyTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('agency')->truncate();
		$now = date('Y-m-d H:i:s');
		$agency = array(
				array(
					'tname'=>'กรมชลประทาน',
					'abbr'=>'RID',
					'ministry_id'=>17,
					'status'=>true,
					'code'=>'07003',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'การไฟฟ้าฝ่ายผลิตแห่งประเทศไทย',
					'abbr'=>'EGAT',
					'ministry_id'=>26,
					'status'=>true,
					'code'=>'50504',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'กรมอุตุนิยมวิทยา',
					'abbr'=>'TMD',
					'ministry_id'=>14,
					'status'=>true,
					'code'=>'11004',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'สถาบันสารสนเทศทรัพยากรน้ำและการเกษตร (องค์การมหาชน)',
					'abbr'=>'HAII',
					'ministry_id'=>6,
					'status'=>true,
					'code'=>'19012',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'กรมอุทกศาสตร์ กองทัพเรือ',
					'abbr'=>'RTN',
					'ministry_id'=>20,
					'status'=>true,
					'code'=>'02005',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'กรมพัฒนาที่ดิน',
					'abbr'=>'LDD',
					'ministry_id'=>17,
					'status'=>true,
					'code'=>'07008',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'สำนักระบายน้ำ กรุงเทพมหานคร',
					'abbr'=>'BMA',
					'ministry_id'=>10,
					'status'=>true,
					'code'=>'15009',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'กรมทรัพยากรธรณี',
					'abbr'=>'DMR',
					'ministry_id'=>15,
					'status'=>true,
					'code'=>'09005',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'กรมเจ้าท่า',
					'abbr'=>'MD',
					'ministry_id'=>16,
					'status'=>true,
					'code'=>'08003',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'สำนักงานพัฒนาเทคโนโลยีอวกาศและภูมิสารสนเทศ (องค์การมหาชน)',
					'abbr'=>'GIST',
					'ministry_id'=>6,
					'status'=>true,
					'code'=>'19006',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'กรมทรัพยากรน้ำ',
					'abbr'=>'DWR',
					'ministry_id'=>15,
					'status'=>true,
					'code'=>'09006',
					'created_at'=>$now,
					'updated_at'=>$now
					),
				array(
					'tname'=>'กรมทรัพยากรน้ำบาดาล',
					'abbr'=>'DGR',
					'ministry_id'=>15,
					'status'=>true,
					'code'=>'09007',
					'created_at'=>$now,
					'updated_at'=>$now
					),
		);

		// Uncomment the below to run the seeder
		DB::table('agency')->insert($agency);
	}

}
