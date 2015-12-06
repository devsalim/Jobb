<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostGroupTaggingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_group_taggings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('post_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->string('mode', 50);
            $table->integer('tag_share_by')->unsigned();
            $table->foreign('post_id')->references('id')->on('postjobs');
            $table->foreign('group_id')->references('id')->on('groups');
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
		Schema::drop('post_group_taggings');
	}

}
