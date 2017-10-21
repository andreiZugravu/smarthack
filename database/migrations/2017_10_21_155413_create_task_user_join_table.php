<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskUserJoinTable extends Migration {

	public function up()
	{
		Schema::create('task_user_join', function(Blueprint $table) {
			$table->integer('user_id')->unsigned();
			$table->integer('task_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('task_user_join');
	}
}