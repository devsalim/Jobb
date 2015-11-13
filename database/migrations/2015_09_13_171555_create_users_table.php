<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->string('mobile');
			$table->string('password', 60);
			$table->unsignedInteger('corpuser_id')->nullable();
			$table->unsignedInteger('induser_id')->nullable();
			$table->unsignedInteger('identifier');
			$table->string('email_verify')->default(0)->nullable();
            $table->string('mobile_verify')->default(0)->nullable();	
            $table->rememberToken();
			$table->timestamps();		
			$table->foreign('corpuser_id')->references('id')->on('corpusers');
			$table->foreign('induser_id')->references('id')->on('indusers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
