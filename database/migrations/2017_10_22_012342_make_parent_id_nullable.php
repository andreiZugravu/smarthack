<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeParentIdNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
             DB::statement('ALTER TABLE `messages` MODIFY `parent_id` INTEGER UNSIGNED NULL;');
            DB::statement('UPDATE `messages` SET `parent_id` = NULL WHERE `parent_id` = 0;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            DB::statement('UPDATE `messages` SET `parent_id` = 0 WHERE `parent_id` IS NULL;');
            DB::statement('ALTER TABLE `messages` MODIFY `parent_id` INTEGER UNSIGNED NOT NULL;');
        });
    }
}
