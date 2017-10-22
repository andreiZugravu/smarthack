<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeamsTable extends Migration {

	public function up()
	{
		Schema::create('teams', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name', 191);
			$table->string('display_name', 191);
<<<<<<< HEAD
            $table->string('description', 191);
=======
			$table->string('description', 191);
>>>>>>> a70c03449f492c48bf3f084c098a9b8e902bba14
		});
	}

	public function down()
	{
		Schema::drop('teams');
	}
}