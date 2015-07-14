<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePolicyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('policy', function(Blueprint $table) {
			$table->increments('id');
			$table->text('policy_content')->nullable(false)->unique();
			$table->string('author')->nullable(false);
			$table->boolean('status')->nullable(false)->default(true);
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
		Schema::drop('policy');
	}

}
