<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type');
            $table->unsignedInteger('receiver');
            $table->unsignedInteger('sender');
            $table->text('extra')->nullable();
            $table->unsignedInteger('notification_seen')->default(0);
            $table->integer('notification_read')->default(0);
            $table->dateTime('notification_date')->useCurrent();
            $table->integer('post_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
