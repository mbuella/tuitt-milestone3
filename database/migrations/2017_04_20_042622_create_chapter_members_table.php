<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_user', function (Blueprint $table) {
            /*$table->increments('id');*/
            $table->mediumInteger('user_id')->unsigned();
            $table->mediumInteger('chapter_id')->unsigned();
            //$table->integer('liked')->default(0);
            $table->integer('hearted')->default(0);
            $table->integer('bookmarked')->default(0);
            $table->timestamps();

            //set primary keys
            $table->primary(['user_id','chapter_id']);
            //set foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('chapter_id')->references('id')->on('chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_members');
    }
}
