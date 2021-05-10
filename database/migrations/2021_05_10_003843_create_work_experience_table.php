<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experience', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->year('job_year_from');
            $table->year('job_year_to');
            $table->string('company_name', 64);
            $table->string('job_reference', 64);
            $table->string('job_duties', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_experience');
    }
}
