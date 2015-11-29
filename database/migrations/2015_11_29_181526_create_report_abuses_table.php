<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportAbusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_abuses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('reported_by')->unsigned();
			$table->string('reported_for', 255);
			$table->foreign('post_id')->references('id')->on('postjobs');
			$table->foreign('reported_by')->references('id')->on('indusers');
			$table->unique(array('post_id', 'reported_by'));
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
		Schema::drop('report_abuses');
	}

}
