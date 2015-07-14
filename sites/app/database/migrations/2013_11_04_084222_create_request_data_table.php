<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRequestDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('request_data', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('data_id')->nullable(false);
			$table->integer('cond_id')->nullable(false);
			$table->string('agency_code')->nullable(false);
			$table->boolean('req_status')->nullable();
			$table->integer('send_userid')->nullable(false);
			$table->integer('send_agencyid')->nullable(false);
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
		Schema::drop('request_data');
	}

}
