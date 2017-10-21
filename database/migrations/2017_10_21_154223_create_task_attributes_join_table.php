<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskAttributesJoinTable extends Migration {

	public function up()
	{
		Schema::create('task_attributes_join', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('task_id')->unsigned();
			$table->integer('task_attribute_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('task_attributes_join');
	}
}