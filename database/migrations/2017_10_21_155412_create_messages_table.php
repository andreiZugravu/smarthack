<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration {

	public function up()
	{
		Schema::create('messages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('text', 191);
			$table->integer('created_by')->unsigned();
			$table->integer('parent_id')->unsigned();
			$table->integer('channel_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('messages');
	}
}