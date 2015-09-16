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
            $table->string('firm_name');
            $table->string('firm_email_id')->nullable();
            $table->string('firm_mobile_no')->nullable();
            $table->string('firm_password');
            $table->string('logo_status')->nullable();
            $table->string('logo_link')->nullable();
            $table->string('active_profile')->nullable();
            $table->string('verified')->nullable();
            $table->string('about_firm')->nullable();
            $table->string('firm_address')->nullable();
            $table->string('operating_since')->nullable();
            $table->string('linked_skill')->nullable();
            $table->string('working_at')->nullable();
            $table->string('website_url')->nullable();
            $table->string('firm_phone')->nullable();
            $table->string('industry')->nullable();
            $table->string('forgot_pwd_count')->nullable();
            $table->string('role')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
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
