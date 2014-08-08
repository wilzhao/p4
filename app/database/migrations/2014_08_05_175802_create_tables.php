<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users',function($table){
			$table->increments('id');

			$table->timestamps();

			$table->string('username')->unique();
			$table->string('password');
			$table->string('email')->unique();

			$table->boolean('remember_token');

		});

		Schema::create('todolists',function($table){
			$table->increments('id');

			$table->timestamps();

			$table->string('name');

			$table->integer('user_id')->unsigned();

			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('todolists');
		Schema::drop('users');
	}

}
