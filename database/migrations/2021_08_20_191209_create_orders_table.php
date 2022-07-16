<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->unsignedInteger('quantity');
            $table->timestamps();
            $table->primary(['user_id','product_id']);

            //TODO add to the quantity if the order already exists
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');

    }
}
