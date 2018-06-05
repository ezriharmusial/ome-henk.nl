<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            // $table->integer('user_id')->default( \App\User::pluck('id')->first());
            $table->string('slug', 30)->unique();
            $table->string('title_icon', 30);
            $table->string('title', 30);
            $table->string('subtitle');
            $table->text('content');
            $table->boolean('has_articles')->default(false);
            $table->boolean('published')->default(false);
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
        Schema::dropIfExists('pages');
    }
}
