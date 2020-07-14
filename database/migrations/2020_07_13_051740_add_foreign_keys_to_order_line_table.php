<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOrderLineTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('order_line', function(Blueprint $table)
		{
			$table->foreign('order_id', 'order_line_order_id_fk')->references('id')->on('order')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('product_id', 'order_line_product_id_fk')->references('id')->on('product')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('order_line', function(Blueprint $table)
		{
			$table->dropForeign('order_line_order_id_fk');
			$table->dropForeign('order_line_product_id_fk');
		});
	}

}
