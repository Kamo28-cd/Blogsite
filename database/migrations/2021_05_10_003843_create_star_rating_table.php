<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star_rating', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('rated_user_id');
            $table->integer('rater_user_id');
            $table->integer('rate');
            $table->timestamp('dt_rated')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('star_rating');
    }
}
