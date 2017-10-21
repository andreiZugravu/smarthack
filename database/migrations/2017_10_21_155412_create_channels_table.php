<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelsTable extends Migration {

	public function up()
	{
		Schema::create('channels', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 191);
			$table->string('description', 191)->nullable();
			$table->integer('created_by')->unsigned();
			$table->string('display_name', 191);
		});
	}

	public function down()
	{
		Schema::drop('channels');
	}
}