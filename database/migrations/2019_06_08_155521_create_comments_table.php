<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
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
        Schema::create('comments', function (Blueprint $table) {
            $table->Increments('id')->unsigned();
            $table->String('comment_sender_name',50);
            $table->text('comment');
            $table->integer('id_post')->unsigned();
            $table->timestamps();
            $table->foreign('id_post')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
