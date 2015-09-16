<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostjobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postjobs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('post_type');
            $table->string('post_title');
            $table->string('post_duration');
            $table->string('post_compname');
            $table->string('linked_skill');
            $table->string('email_id');
            $table->string('phone');
            $table->string('operating_since');
            $table->string('prof_category');
            $table->string('alt_emailid');
            $table->string('alt_phone');
            $table->string('role');
            $table->string('state');
            $table->string('city');
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
		Schema::drop('postjobs');
	}

}
