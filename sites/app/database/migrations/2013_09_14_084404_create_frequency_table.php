<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFrequencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('frequency', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('src_id')->nullable(false);
			$table->integer('fld_id')->nullable(false);
			$table->string('freq_name')->nullable(false)->unique();
			$table->string('comment')->nullable();
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
		Schema::drop('frequency');
	}

}
