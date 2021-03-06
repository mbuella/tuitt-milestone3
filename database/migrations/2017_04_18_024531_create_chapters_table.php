<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->mediumInteger('sort_id');
            $table->string('title');
            $table->mediumText('text')->nullable();
            $table->integer('view_count')->default(0);
            $table->mediumInteger('story_id')->unsigned();
            $table->timestamps();

            //set foreign key
            $table->foreign('story_id')->references('id')->on('stories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('chapters');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
