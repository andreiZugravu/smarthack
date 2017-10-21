<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskAttributesValuesTable extends Migration {

	public function up()
	{
		Schema::create('task_attributes_values', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('value');
			$table->integer('task_attribute_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('task_attributes_values');
	}
}