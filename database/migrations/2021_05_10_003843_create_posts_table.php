<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('body', 500);
            $table->dateTime('posted_at');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('likes');
            $table->string('subject', 50);
            $table->integer('grade');
            $table->string('postimg')->nullable();
            $table->tinyInteger('commented')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
