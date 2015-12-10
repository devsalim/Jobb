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
            $table->integer('user_id')->unsigned();
            $table->string('thanks');
            $table->dateTime('thanks_dtTime');
            $table->string('contact_view');
            $table->dateTime('contact_view_dtTime');
            $table->string('fav_post');
            $table->dateTime('fav_post_dtTime');
            $table->string('apply');
            $table->dateTime('apply_dtTime');

            $table->string('share');
            $table->dateTime('share_dtTime');
            
            $table->foreign('post_id')->references('id')->on('postjobs');
            $table->foreign('user_id')->references('id')->on('users');
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
