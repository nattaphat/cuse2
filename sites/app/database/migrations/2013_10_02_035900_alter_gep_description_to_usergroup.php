<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterGepDescriptionToUsergroup extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usergroup', function(Blueprint $table) {
			$table->renameColumn('gep_description', 'grp_description');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usergroup', function(Blueprint $table) {
			$table->renameColumn('grp_description', 'gep_description');
		});
	}

}
