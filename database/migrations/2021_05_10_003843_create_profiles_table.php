<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('user_location', 150)->nullable();
            $table->string('works_at', 150)->nullable();
            $table->string('acc_type', 20)->nullable();
            $table->string('acc_mode', 20)->nullable();
            $table->dateTime('creation_date', 6)->nullable()->default('current_timestamp(6)');
            $table->dateTime('dateofbirth', 6)->nullable()->default('current_timestamp(6)');
            $table->string('gender', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
