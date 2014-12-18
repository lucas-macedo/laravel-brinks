<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up() {
		Schema::create('products', function(Blueprint $table){
			$table->increments('id');
			$table->integer('category_id')->nullable();
			$table->integer('manufacturer_id')->nullable();
			$table->string('title', 255);
			$table->string('slug', 255);
			$table->text('description')->nullable();
			$table->longText('technical_data')->nullable();
			$table->longText('included_items')->nullable();
			$table->text('seo_description', 255)->nullable();
			$table->text('seo_keywords', 255)->nullable();
			$table->tinyInteger('free_shipping')->default(0);
			$table->float('width');
			$table->float('height');
			$table->float('length');
			$table->float('weight');
			$table->float('status')->default(1);
			$table->float('home')->default(1);
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
		Schema::drop('products');
	}

}
