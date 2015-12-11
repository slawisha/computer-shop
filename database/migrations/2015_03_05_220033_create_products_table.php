<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('name');
            $table->integer('manufacturer_id')->unsigned();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->string('model');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->float('price');
            $table->string('processor')->nullable();
            $table->string('memory')->nullable();
            $table->string('hdd')->nullable();
            $table->string('graphics')->nullable();
            $table->string('screen')->nullable();
            $table->string('optical')->nullable();
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
