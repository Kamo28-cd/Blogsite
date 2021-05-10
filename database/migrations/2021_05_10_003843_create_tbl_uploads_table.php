<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_uploads', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('file', 50);
            $table->string('type', 50);
            $table->integer('size');
            $table->string('location', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_uploads');
    }
}
