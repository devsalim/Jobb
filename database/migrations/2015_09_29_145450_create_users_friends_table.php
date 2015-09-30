<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersFriendsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_friends', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned();
			$table->integer('friend_id')->unsigned();

			$table->foreign('user_id')->references('id')->on('indusers');
			$table->foreign('friend_id')->references('id')->on('indusers');

			$table->primary(array('user_id', 'friend_id'));
			
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
		Schema::drop('users_friends');
	}

}
