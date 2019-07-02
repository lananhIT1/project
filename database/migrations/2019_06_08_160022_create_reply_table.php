<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //cho phép tạo khóa ngoại
        Schema::enableForeignKeyConstraints();
        Schema::create('reply', function (Blueprint $table) {
            $table->Increments('id')->unsigned();
            $table->String('comment_sender_name',50);
            $table->text('comment');
            $table->integer('id_com')->unsigned();
            $table->timestamps();
            $table->foreign('id_com')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reply');
    }
}
