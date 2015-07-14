<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRetainDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('retain_data', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('data_id')->nullable(false)->unique();
			$table->timestamp('period')->nullable(false);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('retain_data');
	}

}
