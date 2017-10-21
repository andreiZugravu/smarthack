<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTeamJoinTable extends Migration {

	public function up()
	{
		Schema::create('user_team_join', function(Blueprint $table) {
			$table->integer('user_id')->unsigned();
			$table->integer('team_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('user_team_join');
	}
}