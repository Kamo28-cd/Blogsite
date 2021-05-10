<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->string('education_type', 11);
            $table->string('institution_name', 64);
            $table->year('education_year_from');
            $table->year('education_year_to');
            $table->string('course_name', 64)->nullable();
            $table->string('achievements', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education');
    }
}
