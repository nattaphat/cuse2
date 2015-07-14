<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePrivacyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('privacy', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('userid');
			$table->boolean('email')->default(false)->nullable();
			$table->boolean('telno')->default(false)->nullable();;
			$table->boolean('agency')->default(false)->nullable();;
			$table->boolean('department')->default(false)->nullable();;
			$table->boolean('ministry')->default(false)->nullable();;
			$table->boolean('data')->default(false)->nullable();;
			$table->boolean('role')->default(false)->nullable();;
			$table->boolean('action')->default(false)->nullable();;
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
		Schema::drop('privacy');
	}

}
