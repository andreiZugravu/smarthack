<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskAttributesTable extends Migration {

	public function up()
	{
		Schema::create('task_attributes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 191);
			$table->string('display_name', 191);
			$table->string('description', 191)->nullable();
			$table->integer('task_attribute_id')->unique()->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('task_attributes');
	}
}