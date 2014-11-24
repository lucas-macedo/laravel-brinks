<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table){
			$table->increments('id');
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('email', 255);
			$table->string('password', 64);
			$table->tinyInteger('status');
			$table->string('cpf', 20);
			$table->string('rg', 20);
			$table->date('birth_date', 64);
			$table->string('phone', 20);
			$table->tinyInteger('newsletter');
            $table->string('remember_token', 100)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('customers');
	}

}
