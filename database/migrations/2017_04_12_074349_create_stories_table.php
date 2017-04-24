<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('title');
            $table->string('title_slug');
            $table->mediumText('intro')->nullable();
            $table->timestamp('pub_date');
            $table->string('cover_filename')->nullable();
            $table->integer('genre_id')->unsigned();
            $table->mediumInteger('author_id')->unsigned();
            $table->timestamps();

            //foreign keys
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('author_id')->references('id')->on('authors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
}
