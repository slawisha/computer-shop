<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number');
			$table->string('email');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('billing_name');
			$table->string('billing_address');
			$table->string('billing_city');
			$table->string('billing_state')->nullable();
			$table->string('billing_zip');
			$table->string('billing_country');
			$table->string('billing_country_code')->nullable();
			$table->string('shipping_name')->nullable();
			$table->string('shipping_address')->nullable();
			$table->string('shipping_city')->nullable();
			$table->string('shipping_state')->nullable();
			$table->string('shipping_zip')->nullable();
			$table->string('shipping_country')->nullable();
			$table->string('shipping_country_code')->nullable();
			$table->softDeletes();
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
		Schema::drop('orders');
	}

}
