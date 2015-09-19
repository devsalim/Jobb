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
		$table->string('reg_via')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('password',255);
            $table->string('profile_pic')->nullable();
            $table->string('profile_pic_link')->nullable();
            $table->string('active_profile')->nullable();
            $table->string('verified')->nullable();
            $table->string('education')->nullable();
            $table->string('branch')->nullable();
            $table->string('experience')->nullable();
            $table->string('prof_category')->nullable();
            $table->string('working_at')->nullable();
            $table->string('linked_skill')->nullable();
            $table->string('resume')->nullable();
            $table->string('resume_link')->nullable();
            $table->string('forgot_pwd_count')->nullable();
            $table->string('role')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
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
