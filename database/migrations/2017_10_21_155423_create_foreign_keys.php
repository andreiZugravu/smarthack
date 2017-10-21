<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('user_team_join', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_team_join', function(Blueprint $table) {
			$table->foreign('team_id')->references('id')->on('teams')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('channels', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('channel_user_join', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('channel_user_join', function(Blueprint $table) {
			$table->foreign('channel_id')->references('id')->on('channels')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->foreign('parent_id')->references('id')->on('messages')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->foreign('channel_id')->references('id')->on('channels')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->foreign('created_by')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->foreign('status_id')->references('status_id')->on('statuses')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->foreign('team_id')->references('id')->on('teams')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('checkboxes', function(Blueprint $table) {
			$table->foreign('task_id')->references('id')->on('tasks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('task_attributes_values', function(Blueprint $table) {
			$table->foreign('task_id')->references('id')->on('tasks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('task_attributes_values', function(Blueprint $table) {
			$table->foreign('task_attribute_id')->references('id')->on('task_attributes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('task_user_join', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('task_user_join', function(Blueprint $table) {
			$table->foreign('task_id')->references('id')->on('tasks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('user_team_join', function(Blueprint $table) {
			$table->dropForeign('user_team_join_user_id_foreign');
		});
		Schema::table('user_team_join', function(Blueprint $table) {
			$table->dropForeign('user_team_join_team_id_foreign');
		});
		Schema::table('channels', function(Blueprint $table) {
			$table->dropForeign('channels_created_by_foreign');
		});
		Schema::table('channel_user_join', function(Blueprint $table) {
			$table->dropForeign('channel_user_join_user_id_foreign');
		});
		Schema::table('channel_user_join', function(Blueprint $table) {
			$table->dropForeign('channel_user_join_channel_id_foreign');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_created_by_foreign');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_parent_id_foreign');
		});
		Schema::table('messages', function(Blueprint $table) {
			$table->dropForeign('messages_channel_id_foreign');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->dropForeign('tasks_created_by_foreign');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->dropForeign('tasks_status_id_foreign');
		});
		Schema::table('tasks', function(Blueprint $table) {
			$table->dropForeign('tasks_team_id_foreign');
		});
		Schema::table('checkboxes', function(Blueprint $table) {
			$table->dropForeign('checkboxes_task_id_foreign');
		});
		Schema::table('task_attributes_values', function(Blueprint $table) {
			$table->dropForeign('task_attributes_values_task_id_foreign');
		});
		Schema::table('task_attributes_values', function(Blueprint $table) {
			$table->dropForeign('task_attributes_values_task_attribute_id_foreign');
		});
		Schema::table('task_user_join', function(Blueprint $table) {
			$table->dropForeign('task_user_join_user_id_foreign');
		});
		Schema::table('task_user_join', function(Blueprint $table) {
			$table->dropForeign('task_user_join_task_id_foreign');
		});
	}
}