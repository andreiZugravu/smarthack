<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 191);
			$table->string('description', 191)->nullable();
			$table->integer('created_by')->unsigned();
			$table->datetime('deadline')->nullable();
			$table->integer('status_id')->unsigned();
			$table->integer('team_id')->unsigned();
			$table->enum('priority', array('low', 'medium', 'high'));
		});
	}

	public function down()
	{
		Schema::drop('tasks');
	}
}