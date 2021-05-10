<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('store_id');
            $table->string('product_title', 20);
            $table->integer('oldprice')->nullable();
            $table->integer('price');
            $table->string('product_image', 20);
            $table->string('product_type', 20);
            $table->string('product_description', 150);
            $table->dateTime('creation_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
