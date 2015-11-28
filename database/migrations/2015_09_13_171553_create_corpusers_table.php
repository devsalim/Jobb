<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorpusersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('corpusers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firm_type');
			$table->string('username')->nullable();
			$table->integer('emp_count')->nullable();
			$table->string('working_as')->nullable();
			$table->string('slogan')->nullable();
            $table->string('firm_name');
            $table->string('firm_email_id')->nullable();
            $table->string('logo_status')->nullable();
            $table->string('active_profile')->nullable();
            $table->string('verified')->nullable();
            $table->string('about_firm')->nullable();
            $table->string('firm_address')->nullable();
            $table->string('operating_since')->nullable();
            $table->string('linked_skill')->nullable();
            $table->string('website_url')->nullable();
            $table->string('firm_phone')->nullable();
            $table->string('prof_category')->nullable();
            $table->string('industry')->nullable();
            $table->string('role')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('email_verify')->default(0)->nullable();
	        $table->string('mobile_verify')->default(0)->nullable();
	        $table->string('mobile_otp')->nullable();
	        $table->string('email_vcode')->nullable();
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
		Schema::drop('corpusers');
	}

}
