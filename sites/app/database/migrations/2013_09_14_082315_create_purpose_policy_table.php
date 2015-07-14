<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurposePolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purpose_policy', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('purp_id')->nullable(false);
			$table->integer('policy_id')->nullable(false);
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
		Schema::drop('purpose_policy');
	}

}
