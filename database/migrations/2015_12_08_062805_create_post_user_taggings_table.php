<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostUserTaggingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_user_taggings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('mode', 50);
            $table->integer('tag_share_by')->unsigned();
            $table->foreign('post_id')->references('id')->on('postjobs');
            $table->foreign('user_id')->references('id')->on('indusers');
            $table->foreign('tag_share_by')->references('id')->on('indusers');
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
		Schema::drop('post_user_taggings');
	}

}
