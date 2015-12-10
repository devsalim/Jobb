<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('from_user')->nullable();
			$table->unsignedInteger('to_user')->nullable();
			$table->string('remark', 255)->nullable();
			$table->string('operation', 100)->nullable();
			$table->unsignedInteger('view_status')->default(0);
			$table->timestamps();
			$table->foreign('from_user')->references('id')->on('users');
			$table->foreign('to_user')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('notifications');
	}

}
