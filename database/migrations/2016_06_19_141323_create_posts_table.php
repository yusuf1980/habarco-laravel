<?php

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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('published')->default(0);
            $table->integer('user_id')->unsigned();
            $table->boolean('headnews')->default(0);
            $table->boolean('breaking')->default(0);
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE posts ADD FULLTEXT search(title, description)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table)
        {
            $table->dropIndex('search');
            $table->drop();
        });
        //Schema::drop('posts');
    }
}
