<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddMinsitryIdToMinistryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('ministry', function(Blueprint $table) {
			$table->integer('ministry_id')->nullable(false);
			$table->string('code',20)->nullable(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('ministry', function(Blueprint $table) {
			$table->dropColumn('ministry_id');
			$table->dropColumn('code');
		});
	}

}
