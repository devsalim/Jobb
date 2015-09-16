<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostactivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postactivities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
            $table->integer('induser_id')->unsigned();
            $table->integer('corpuser_id')->unsigned();
            $table->string('interest');
            $table->string('Contact_view_status');
            $table->string('Contact_view_DtTime');
            $table->string('Int_dtTime');
            $table->string('Pin_post_status');
            $table->string('Pin_post_dtTime');
            $table->foreign('post_id')->references('id')->on('postjobs');
            $table->foreign('induser_id')->references('id')->on('indusers');
            $table->foreign('corpuser_id')->references('id')->on('corpusers');
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
		Schema::drop('postactivities');
	}

}
