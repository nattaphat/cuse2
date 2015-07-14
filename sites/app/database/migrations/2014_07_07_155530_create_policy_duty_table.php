<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePolicyDutyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policy_duty', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fname')->nullable(false)->unique();
			$table->string('lastname')->nullable(false)->unique();
			$table->string('position')->nullable(false)->unique();
			$table->string('email')->nullable(false)->unique();
			$table->string('tel')->nullable(false)->unique();
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
		Schema::drop('policy_duty');
	}

}
