<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call('UserTableSeeder');
		$this->call('UsernhcTableSeeder');
		$this->call('PolicyTableSeeder');
		$this->call('SrctableTableSeeder');
		$this->call('UsergroupTableSeeder');
		$this->call('AgencyTableSeeder');
		//$this->call('MinistryTableSeeder');
		$this->call('RoleTableSeeder');
		$this->call('DataTableSeeder');
		$this->call('ConditionTableSeeder');
		$this->call('PurposeTableSeeder');
		$this->call('ActionTableSeeder');
		$this->call('ObligationTableSeeder');
		$this->call('PrivacyTableSeeder');
		$this->call('DataPrivacyTableSeeder');
		$this->call('RoleUserTableSeeder');
		$this->call('RequesttypeTableSeeder');
	}

}