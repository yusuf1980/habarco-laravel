<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('instansi')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->boolean('published')->default(0);
            $table->string('url')->nullable();
            $table->timestamp('startdate')->nullable();
            $table->timestamp('enddate')->nullable();
            $table->integer('user_id')->unsigned();
            $table->text('description')->nullable();
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
        Schema::drop('banners');
    }
}
