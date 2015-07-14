<?php

class DataTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('data')->truncate();
		$now = date('Y-m-d H:i:s');
		$data = array(
					array(
						'data_name'=>'ปริมาณน้ำฝนราย 24 ชั่วโมง',
						'table_name'=>'rainfall_sumary-rainfall24h-rainfall24h_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ปริมาณน้ำฝนวันนี้',
						'table_name'=>'rainfall_sumary-rainfall_today-rainfall_today_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ปริมาณน้ำฝนวานนี้',
						'table_name'=>'rainfall_sumary-rainfall_yesterday-rainfall_yesterday_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ปริมาณน้ำฝนย้อนหลัง',
						'table_name'=>'rainfall_168h-rainfall1h-rainfall_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ข้อมูลระดับน้ำ',
						'table_name'=>'wl_168h-water_level-wl_tele_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ข้อมูลน้ำในเขื่อน',
						'table_name'=>'damdaily-dam_storage_daily-dam_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ข้อมูลความเข้มแสง',
						'table_name'=>'solar_168h-solar_value-solar_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ข้อมูลความชื้น',
						'table_name'=>'humid_168h-humid_valuesolar_date-humid_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ข้อมูลความกดอากาศ',
						'table_name'=>'pressure_168h-pressure_value-pressure_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ข้อมูลอุณหภูมิ',
						'table_name'=>'temp_168h-temp_value-temp_date',
						'created_at' => $now,
						'updated_at' => $now,
						),
					array(
						'data_name'=>'ข้อมูลระดับน้ำทะเล',
						'table_name'=>'wl_168h-water_level-wl_tele_date-telertn0001',
						'created_at' => $now,
						'updated_at' => $now,
						)
		);

		// Uncomment the below to run the seeder
		DB::table('data')->insert($data);
	}

}
