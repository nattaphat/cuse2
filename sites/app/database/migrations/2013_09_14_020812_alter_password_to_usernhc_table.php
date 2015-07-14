<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AlterPasswordToUsernhcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usernhc', function(Blueprint $table) {
			$table->renameColumn('password', '_token');
			$table->boolean('rememberme')->default(true);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('usernhc', function(Blueprint $table) {
			$table->renameColumn('_token', 'password');
			$table->dropColumn('rememberme');
		});
	}

}
