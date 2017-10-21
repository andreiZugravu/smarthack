<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('lead')->unsigned();
            $table->foreign('lead')->references('id')->on('users');
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign('teams_created_by_foreign');
            $table->dropColumn('created_by');
            $table->dropForeign('teams_lead_foreign');
            $table->dropColumn('lead');
        });
    }
}
