<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndusersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('indusers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('post_type')->nullable();
			$table->string('individual_id')->nullable();
			$table->string('corporate_id')->nullable();
            $table->string('post_title')->nullable();
            $table->string('post_duration')->nullable();
            $table->string('post_compname')->nullable();
            $table->string('linked_skill')->nullable();
            $table->string('email_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('min_exp')->nullable();
            $table->string('max_exp')->nullable();
            $table->string('min_sal')->nullable();
            $table->string('max_sal')->nullable();
            $table->string('prof_category')->nullable();
            $table->string('alt_emailid')->nullable();
            $table->string('alt_phone')->nullable();
            $table->string('job_detail')->nullable();
            $table->string('role')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->rememberToken();
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
		Schema::drop('indusers');
	}

}
