<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('title',150);
            $table->text('summary');
            $table->text('content');
            $table->string('image_small',150);
            $table->string('image_big',150);
            $table->integer('id_cat')->unsigned();
            $table->integer('views')->unsigned()->default(0);
            $table->integer('status')->defaul(1);

            
            $table->timestamps();
            $table->foreign('id_cat')->references('id')->on('categories')->onDelete('cascade');
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
