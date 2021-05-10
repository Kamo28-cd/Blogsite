<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->string('store_name', 20);
            $table->string('store_profimage', 50)->nullable()->default('profile_img/default.png');
            $table->string('store_type', 50);
            $table->dateTime('creation_date')->useCurrent();
            $table->string('store_coverimage', 50)->default('cover_img/default.jpg');
            $table->tinyInteger('verified')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
