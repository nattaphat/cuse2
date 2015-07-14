<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterDepIdToMinistryIdAgencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('agency', function(Blueprint $table) {
			$table->renameColumn('dep_id', 'ministry_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('agency', function(Blueprint $table) {
			$table->renameColumn('ministry_id', 'dep_id');
		});
	}

}
