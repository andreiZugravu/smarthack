<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCheckboxesTable extends Migration {

	public function up()
	{
		Schema::create('checkboxes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('text', 191);
			$table->boolean('completed');
			$table->integer('task_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('checkboxes');
	}
}