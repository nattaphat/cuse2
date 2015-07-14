<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMinistryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ministry2', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('ministry_id')->nullable(false);
			$table->string('full_name', 256)->unique();
			$table->string('short_name', 256)->nullable();
			$table->string('code', 20)->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ministry');
	}

}
