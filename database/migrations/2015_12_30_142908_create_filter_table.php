<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$table->increments('id');
		$table->unsignedInteger('from_user')->nullable();
		$table->string('job_title')->nullable();
		$table->string('time_for')->nullable();
		$table->string('experience')->nullable();
		$table->string('city')->nullable();
		$table->string('linked_skill')->nullable();
		$table->string('prof_category')->nullable();
		$table->string('unique_id')->nullable();
		$table->string('posted_by')->nullable();
		$table->string('expired')->nullable();
		$table->string('job_title')->nullable();
		$table->timestamps();
		$table->foreign('from_user')->references('id')->on('users');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
