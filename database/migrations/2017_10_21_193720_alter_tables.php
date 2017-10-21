<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar', 191)->default('/assets/images/placeholder.jpg');
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->string('avatar', 191)->default('/assets/images/placeholder.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });

        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('avatar');
        });
    }
}
