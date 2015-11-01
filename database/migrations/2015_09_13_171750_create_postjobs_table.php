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
                  $table->string('unique_id')->nullable();
			$table->string('post_type')->nullable();
			$table->integer('individual_id')->unsigned()->nullable();
			$table->integer('corporate_id')->unsigned()->nullable();
                  $table->string('post_title')->nullable();
                  $table->string('post_duration')->nullable();
                  $table->string('post_duration_extend')->default(0);
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
                  $table->string('time_for')->nullable();
                  $table->string('education')->nullable();
                  $table->string('website_redirect')->default(0); //Company website check box for Yes or No
                  $table->string('website_redirect_url')->nullable();
                  $table->string('salary_type')->nullable();
                  $table->string('reference_id')->nullable();
                  $table->string('contact_person')->nullable();
                  $table->string('post_expire')->default(0); //Post Expire Button column
                  $table->string('post_expire_Dt')->nullable();
                  $table->string('resume_required')->default(0);
                  $table->foreign('individual_id')->references('id')->on('indusers');
                  $table->foreign('corporate_id')->references('id')->on('corpusers');
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

