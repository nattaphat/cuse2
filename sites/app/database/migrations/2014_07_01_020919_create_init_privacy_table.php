<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInitPrivacyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('privacy_init', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_en')->nullable(false)->unique();
			$table->string('name_th')->nullable(false)->unique();
			$table->string('privacy_type')->nullable(false);
			$table->boolean('removeable')->nullable(false);
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
		Schema::drop('init_privacy');
	}

}
