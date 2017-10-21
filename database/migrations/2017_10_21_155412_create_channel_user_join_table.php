<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelUserJoinTable extends Migration {

	public function up()
	{
		Schema::create('channel_user_join', function(Blueprint $table) {
			$table->integer('user_id')->unsigned();
			$table->integer('channel_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('channel_user_join');
	}
}