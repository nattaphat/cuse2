<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DelActiveColumnUsernhcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usernhc', function(Blueprint $table) {
			$table->dropColumn('active');
			$table->string('status')->nullable(false)->default('no');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('active_column_usernhc');
	}

}
