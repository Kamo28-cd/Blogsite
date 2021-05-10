<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->string('email', 20);
            $table->integer('cell_number')->nullable();
            $table->integer('tel_number')->nullable();
            $table->string('social_facebook', 64)->nullable();
            $table->string('social_whatsapp', 64)->nullable();
            $table->string('social_linkedin', 64)->nullable();
            $table->string('website_url', 150)->nullable();
            $table->string('social_other_1', 150)->nullable();
            $table->string('social_other_2', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_details');
    }
}
