<?php

class PolicyTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('policy')->truncate();
		$now = date('Y-m-d H:i:s');

		$policy = array(
					array(
						'policy_content'=>"นักวิจัยได้รับอนุญาติให้เรียกดูข้อมูล ปริมาณน้ำฝนโดยจะต้องเข้าสู่ระบบก่อนที่จะเรียกดูข้อมูลตามความถี่ของข้อมูลดังนี้
  1.ข้อมูลปริมาณน้ำฝนราย 24 ชั่วโมง
  2.ข้อมูลปริมาณน้ำฝนวันนี้
  3.ข้อมูลปริมาณน้ำฝนวานนี้
  4.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  5.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน โดยมีวัตถุประสงค์เพื่องานวิจัยข้อมูลเท่านั้น และเมื่อต้องการดาวน์โหลดข้อมูลจะต้องได้รับความยินยอมจากเจ้าหน้าที่คลังข้อมูลแห่งชาติก่อน
หลังจากออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),
					array(
						'policy_content'=>"นักวิจัยสามารถเรียกดูข้อมูลเมื่อเข้าสู่ระบบก่อนและเรียกดูข้อมูลระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน
  2.ข้อมูลราย 3 วัน
  3.ข้อมูลราย 7 วัน  โดยมีวัตถุประสงค์เพื่องานวิจัยข้อมูลเท่านั้น และเมื่อต้องการดาวน์โหลดข้อมูลจะต้องได้รับความยินยอมจากเจ้าหน้าที่คลังข้อมูลแห่งชาติก่อน
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),array(
						'policy_content'=>"นักพัฒนาระบบสามารถเรียกดูข้อมูลเมื่อเข้าสู่ระบบก่อนและแจ้งกลับไปยังเจ้าหน้าที่ดูแลข้อมูลคลังข้อมูลแห่งชาติในกรณีข้อมูลไม่ถูกต้อง โดยสามารถเรียนกดูข้อมูลปริมาณน้ำฝนได้ดังนี้
  1.ข้อมูลปริมาณน้ำฝนราย 24 ชั่วโมง
  2.ข้อมูลปริมาณน้ำฝนวันนี้
  3.ข้อมูลปริมาณน้ำฝนวานนี้
  4.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  5.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน  โดยมีวัตถุประสงค์เพื่อการพัฒนาระบบเท่านั้น 
หลังจากออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),array(
						'policy_content'=>"นักพัฒนาระบบสามารถเรียกดูข้อมูลก่อนและแจ้งกลับไปยังเจ้าหน้าที่ดูแลข้อมูลคลังข้อมูลแห่งชาติในกรณีข้อมูลไม่ถูกต้อง โดยสามารถเรียนกดูข้อมูล ระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน
  2.ข้อมูลราย 3 วัน
  3.ข้อมูลราย 7 วัน  โดยมีวัตถุประสงค์เพื่อการพัฒนาระบบเท่านั้น 
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),array(
						'policy_content'=>"ผู้ดูแลฐานข้อมูลสามารถเรียกดูข้อมูลเมื่อเข้าสู่ระบบก่อนและแจ้งกลับไปยังเจ้าหน้าที่ดูแลข้อมูลคลังข้อมูลแห่งชาติในกรณีข้อมูลไม่ถูกต้อง โดยสามารถเรียกดูข้อมูล ปริมาณน้ำฝน ระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน ได้ 100 เรคคอร์ด
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),array(
						'policy_content'=>"บุคคลทั่วไปสามารถเรียกดูข้อมูล ปริมาณน้ำฝนตามความถี่ของข้อมูลได้ดังนี้
  1.ข้อมูลปริมาณน้ำฝนราย 24 ชั่วโมง
  2.ข้อมูลปริมาณน้ำฝนวันนี้
  3.ข้อมูลปริมาณน้ำฝนวานนี้
โดยสามารถดูข้อมูลได้ 20 อันดับสูงสุดเท่านั้น",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),array(
						'policy_content'=>"บุคคลทั่วไปเจ้าหน้าที่ในคลังข้อมูลแห่งชาติสามารถเรียกดูข้อมูล ระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน
โดยสามารถดูข้อมูลได้ 20 อันดับสูงสุดเท่านั้น",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),array(
						'policy_content'=>"เจ้าหน้าที่ของแต่ละหน่วยงานที่ให้ข้อมูลกับคลังข้อมูลแห่งชาติสามารถเรียกดูข้อมูลได้ 200 เรคคอร์ด เมื่อเข้าสู่ระบบก่อนและขออนุญาตเปิดเผยข้อมูล ขออนุญาตส่งต่อข้อมูล ข้อมูลปริมาณน้ำฝน จะต้องได้รับการยินยอมจากหน่วยงานเจ้าของข้อมูลก่อน ตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน
  2.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  3.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน โดยมีวัตถุประสงค์เพื่อใช้ข้อมูลในหน่วยงานเท่านั้น
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),array(
						'policy_content'=>"เจ้าหน้าที่ของแต่ละหน่วยงานที่ให้ข้อมูลกับคลังข้อมูลแห่งชาติสามารถเรียกดูข้อมูลได้ 200 เรคคอร์ดเมื่อเข้าสู่ระบบก่อนและขออนุญาตเปิดเผยข้อมูล ขออนุญาตส่งต่อข้อมูล ข้อมูลระดับน้ำ ข้อมูลเขื่อน ความเข้มแสง ความชื้น ควากดอากาศ อุณหภูมิ ระดับน้ำทะเล จะต้องได้รับการยินยอมจากหน่วยงานเจ้าของข้อมูลก่อนตามความถี่ของข้อมูลต่อไปนี้
  1.ข้อมูลปัจจุบัน โดยมีวัตถุประสงค์เพื่อใช้ข้อมูลในหน่วยงานเท่านั้น
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					),array(
						'policy_content'=>"เจ้าหน้าที่ของคลังข้อมูลแห่งชาติจะต้องเข้าสู่ระบบก่อนจึงจะสามารถเรียกดู เพิ่มข้อมูล ปรับปรุง และลบข้อมูลออกจากคลังข้อมูลแห่งชาติ โดยสามารถกระทำได้กับข้อมูลปริมาณน้ำฝนความถี่ข้อมูลดังนี้
  1.ข้อมูลปริมาณน้ำฝนราย 24 ชั่วโมง
  2.ข้อมูลปริมาณน้ำฝนวันนี้
  3.ข้อมูลปริมาณน้ำฝนวานนี้
  4.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  5.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน
ข้อมูลระดับน้ำ ข้อมูลเขื่อน ข้อมูลความเข้มแสง ข้อมูลความชื่น ข้อมูลความกดอากาศ ข้อมูลอุณภูมิ ข้อมูลระดับน้ำทะเล ความถี่ข้อมูลดังนี้
  1.ข้อมูลปัจจุบัน
  2.ข้อมูลปริมาณน้ำฝนย้องหลัง 3 วัน
  3.ข้อมูลปริมาณน้ำฝนย้อนหลัง 7 วัน โดยมีวัตถุประสงค์เพื่อการบริหารและดูแลคลังข้อมูลแห่งชาติเท่านั้น
หลังจากที่ออกจากระบบ ระบบจะทำการบันทึกประวัติการเรียกดูข้อมูลดังกล่าว",
						'author'=>"เอกชัย บุญจาริยะ",
						'status'=>true,
						'created_at' => $now,
						'updated_at' => $now,
					)
				);

		// Uncomment the below to run the seeder
		 DB::table('policy')->insert($policy);
	}

}
