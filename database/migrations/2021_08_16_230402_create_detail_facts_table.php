<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailFactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_facts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('master_fact_id')->references('id')->on('master_facts')->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products');
            $table->unsignedInteger('quantity');
            $table->unsignedDecimal('price',10);
            $table->boolean('tax_flag')->default(true);
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
        Schema::dropIfExists('detail_facts');
    }
}
