<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('department', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('tname',256)->unique()->nullable(false);
			$table->string('ename',256)->nullable();
			$table->string('code',15)->nullable();
			$table->integer('ministry_id')->nullable(false);
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
		Schema::drop('department');
	}

}
