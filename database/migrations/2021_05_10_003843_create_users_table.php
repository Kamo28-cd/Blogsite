<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('username', 32);
            $table->string('password', 60);
            $table->text('email');
            $table->string('category', 50)->nullable();
            $table->string('industry', 50);
            $table->string('profileimg')->nullable()->default('profile_img/default.png');
            $table->string('coverimg')->nullable()->default('cover_img/default.jpg');
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
        Schema::dropIfExists('users');
    }
}
