<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscolseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('discolse', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('freqdata_id')->nullable(false);
			$table->boolean('status')->nullable(false)->defaule(false);
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
		Schema::drop('discolse');
	}

}
