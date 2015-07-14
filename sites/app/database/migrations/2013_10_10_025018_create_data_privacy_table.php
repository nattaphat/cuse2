<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataPrivacyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_privacy', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('data_id')->nullable(false);
			$table->integer('user_id')->nullable(false);
			$table->boolean('status')->nullable(false)->default(false);
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
		Schema::drop('data_privacy');
	}

}
