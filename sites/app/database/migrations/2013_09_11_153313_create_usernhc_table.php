<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsernhcTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usernhc', function(Blueprint $table) {
			$table->integer('id', true);
			$table->integer('agency_id')->nullable(false);
			$table->integer('grp_id')->nullable(false);
			$table->string('username')->unique()->nullable(false);
			$table->string('password')->unique()->nullable(false);
			$table->string('email')->unique()->nullable(false);
			$table->string('fname')->unique()->nullable(false);
			$table->string('lname')->nullable();
			$table->string('telno')->nullable();
			$table->boolean('active')->default(true);
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
		Schema::drop('usernhc');
	}

}
