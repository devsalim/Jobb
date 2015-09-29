<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostjobSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postjob_skills', function(Blueprint $table)
		{
			$table->integer('postjob_id')->unsigned()->index();
			$table->foreign('postjob_id')->references('id')->on('postjobs')->onDelete('cascade');

			$table->integer('skills_id')->unsigned()->index();
			$table->foreign('skills_id')->references('id')->on('skills')->onDelete('cascade');
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
		Schema::drop('post_skills');
	}

}
