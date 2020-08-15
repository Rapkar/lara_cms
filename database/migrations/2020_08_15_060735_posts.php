<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('post_title');
            $table->longText('post_content');
            $table->integer('post_views');
            $table->integer('post_Likes');
            $table->string('post_author');
            $table->string('post_status');
            $table->bigInteger('comment_count');
            $table->string('comment_status');
            $table->integer('category_id');
            $table->timestamp('post_time');
            $table->rememberToken();
            $table->timestamps();
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
