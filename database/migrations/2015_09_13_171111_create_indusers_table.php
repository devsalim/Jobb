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
            $table->string('fname');
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            
            //Added two column dob and gender
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();

            $table->string('profile_pic')->nullable();
            $table->string('active_profile')->nullable();
            $table->string('verified')->nullable();
            $table->string('education')->nullable();
            $table->string('branch')->nullable();
            $table->string('experience')->nullable();
            $table->string('prof_category')->nullable();
            $table->string('working_at')->nullable();
            $table->string('linked_skill')->nullable();
            $table->string('resume')->nullable();
            $table->dateTime('resume_dtTime');
            $table->string('role')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('prefered_location')->nullable();
            $table->string('prefered_jobtype')->nullable();
            $table->string('about_individual')->nullable();
            $table->string('email_verify')->default(0)->nullable();
            $table->string('mobile_verify')->default(0)->nullable();
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
