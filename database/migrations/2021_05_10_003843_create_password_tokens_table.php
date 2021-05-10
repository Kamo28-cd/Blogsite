<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->char('token', 64)->unique('token');
            $table->unsignedInteger('user_id');
            $table->string('email', 20);
            $table->dateTime('date', 6);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_tokens');
    }
}
