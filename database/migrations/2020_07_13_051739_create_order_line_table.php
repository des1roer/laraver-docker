<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderLineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_line', function(Blueprint $table)
		{
            $table->integer('id')->autoIncrement();
			$table->integer('order_id')->index('order_line_order_id_fk');
			$table->integer('product_id')->index('order_line_product_id_fk');
			$table->integer('qty');
			$table->integer('price');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_line');
	}

}
