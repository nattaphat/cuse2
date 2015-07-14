<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSourceFieldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('source_field', function(Blueprint $table) {
			$table->increments('id');
			$table->string('fld_name')->nullable(false)->unique();
			$table->string('fld_where')->nullable();
			$table->string('fld_order')->nullable();
			$table->string('fld_limit')->nullable();
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
		Schema::drop('source_field');
	}

}
