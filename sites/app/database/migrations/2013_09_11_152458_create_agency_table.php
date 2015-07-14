<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agency', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('tname',200)->unique();
			$table->string('abbr',100)->nullable();
			$table->integer('dep_id')->nullable(false);
			$table->boolean('status')->default(true);
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
		Schema::drop('agency');
	}

}
