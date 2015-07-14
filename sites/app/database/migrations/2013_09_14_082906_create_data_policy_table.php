<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataPolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_policy', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('data_id')->nullable(false);
			$table->integer('policy_id')->nullable(false);
			$table->integer('cond_id')->nullable(false);
			$table->integer('obl_id')->nullable(false);
			$table->integer('purp_id')->nullable(false);
			//$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('data_policy');
	}

}
